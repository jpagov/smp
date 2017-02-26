<?php
namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;

class AdminStaffImageCommand extends Command
{
    protected function configure()
    {
        $this->setName("admin:image")
             ->setDescription("Profile image report")
             ->addArgument(
                'id',
                InputArgument::IS_ARRAY | InputArgument::OPTIONAL,
                'Filter by Division ID. Separated by space.'
             )
             ->setHelp('Profile <info>image</info> report for staff');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = PATH . 'content' . DS;
        $default = ['id', 'display_name', 'email', 'position', 'email', 'telephone'];

        $progress = new ProgressBar($output, 50);
        $progress->start();

        $divisions = $input->getArgument('id') ?
            \Division::where_in('id', $input->getArgument('id'))->get(['id', 'slug', 'title', 'staff']) :
            \Division::listing();

        if (!array_filter($divisions)) {
            $output->writeln('<error>No division found</error>');
            return;
        }

        $count = 0;
        $noavatar = [];

        foreach ($divisions as $division) {
            if ($output->isVerbose()) {
                $output->writeln('<info>=== Getting staff list on ' . $division->title . ' ===</info>');
            }

            $staffs = \Staff::sort('grade', 'desc');

            $staffs->where('division', '=', $division->id)
                ->where('status', '=', 'active')
                ->where('display_name', '!=', '');

            $count += $staffs->count();

            $staffs = $staffs->get($default);

            $csv = $path . strtoupper($division->slug) . '.csv';

            if (is_readable($csv)) {
                unlink($csv);
            }

            $fp = fopen($csv, 'w');

            foreach ($staffs as $staff) {
                $username = preg_replace("/^([^@]+)(@.*)$/", "$1", $staff->email) . '.jpg';

                $avatar = 'avatar' . DS . $username;

                /*
                if($extend = \Extend::field('staff', 'avatar', $staff->id)) {
                    $avatar = 'avatar' . DS .  \Extend::value($extend);
                }
                */

                $filepath = $path . $avatar;

                if (file_exists($filepath)) {
                    continue;
                }

                if ($output->isVerbose()) {
                    $output->writeln('<info>Found staff with no avatar ' . $staff->display_name . '</info>');
                }

                fputcsv($fp, [
                    $staff->id,
                    $staff->display_name,
                    $staff->position,
                    $staff->email,
                    $staff->telephone,
                ]);
            }

            $progress->getProgress();
            $progress->advance();
        }
        fclose($fp);

        $output->writeln(PHP_EOL . 'There are ' . $progress->getProgress() . '/' . $count .' staff have no avatar');
        $output->writeln(PHP_EOL . 'CSV locate here: ' . $path);
    }
}
