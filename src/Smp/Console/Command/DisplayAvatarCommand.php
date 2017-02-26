<?php
namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;

class DisplayAvatarCommand extends Command
{
    protected function configure()
    {
        $this->setName("displayavatar")
             ->setDescription("Set avatar to displayed or not")
             ->addArgument(
                'id',
                InputArgument::IS_ARRAY,
                'Filter by staff ID. Can use division id.'
             )
             ->addOption('force', 'f', InputOption::VALUE_NONE, 'Force display avatar for all staff.' . PHP_EOL)
             ->addOption('rate', 'r', InputOption::VALUE_REQUIRED, 'Rating. From 1 to 5.' . PHP_EOL, 5)
             ->setHelp('Set <info>rating</info> for staff');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filter = false;
        $id = array();

        if ($ids = $input->getArgument('id')) {
            $filter = true;
        }

        $query = \Staff::where('status', '=', 'active');

        if ($filter) {
            $query->where_in('id', $ids, 'AND ');
        }

        $count = $query->count();
        $staffs = $query->get();

        $progress = new ProgressBar($output, 50);
        $progress->start();

        $rateCount = 0;

        foreach ($staffs as $staff) {
            if (!$force = $input->getOption('force')) {
                if ($rating = \Rating::where('staff', '=', $staff->id)->get()) {
                    $output->writeln(PHP_EOL . PHP_EOL . ' ' . $staff->id . ' already have rating. Skipped.');
                    continue;
                }
            }

            \Rating::create(array(
                'staff' => $staff->id,
                'score' => $input->getOption('rate'),
                'created' => \Date::mysql('now'),
            ));

            $rateCount++;
            $progress->getProgress();
            $progress->advance();
        }

        //print_r($progress->display());



        $output->writeln(PHP_EOL . PHP_EOL . 'Done updating ' . $progress->getProgress() . '/' . $count .' staff');
    }
}
