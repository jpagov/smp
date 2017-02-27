<?php

namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class AdminRemoveHierarchiesCommand extends Command
{
    protected $valid = ['branch', 'sector', 'unit'];
    protected $counter = [];

    protected function configure()
    {
        $this->setName("admin:hierarchy")
             ->setDescription("Fix staff hierarchy")
             ->addArgument(
                'type',
                InputArgument::IS_ARRAY,
                'Type to check. Default all. `branch`, `sector` or `unit`. (separate multiple names with a space)',
                $this->valid
             )
            ->addOption(
                'backup',
                'b',
                InputOption::VALUE_OPTIONAL,
                'Do you want to backup?',
                'no'
            )
            ->setHelp('Fix staff <info>hierarchy</info>. This command also <error>remove</error> branch/sector/unit doesnt have staff');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $question = new ConfirmationQuestion('<question>This will remove your data. Continue with this action?</question>', false);

        if (!$helper->ask($input, $output, $question)) {
            return;
        }

        $qs = new Question('<comment>Username:</comment> ');
        $username = $helper->ask($input, $output, $qs);

        $qs = new Question('<comment>Password:</comment> ');
        $qs->setHidden(true);
        $qs->setHiddenFallback(false);
        $password = $helper->ask($input, $output, $qs);

        $attempt = \Auth::attempt($username, $password);

        if (! $attempt) {
            $output->writeln('<error>' . __('users.login_error') . '</error>');

            return;
        }

        $formatter = $this->getHelper('formatter');

        $valid = array_intersect($this->valid, $input->getArgument('type'));

        foreach ($valid as $type) {

            // get hierarchy id base on type and group then
            $staffs = \Staff::group($type)->get([$type]);
            $ids = [];
            foreach ($staffs as $staff) {
                $ids[] = $staff->$type;
            }

            // check the ids if not in use
            $class = "\\" . $type;

            $query = $class::sort('id');

            $this->counter[$type]['total'] = $query->count();

            $query = $query->where_not('id', $ids);

            $this->counter[$type]['deleted'] = $query->count();

            $hierarchies = $query->get();

            $progress = new ProgressBar($output, 50);
            $progress->start();

            foreach ($hierarchies as $hierarchy) {
                //  $output->writeln(' <comment>Deleted</comment>: ' . $hierarchy->title);
                $formattedLine = $formatter->formatSection(
                    ucfirst($type),
                    '<comment>Deleted</comment>: ' . $hierarchy->title
                );
                $output->writeln($formattedLine);

                $hierarchy->delete();
                $progress->advance();
            }

            $progress->finish();
        }
        $output->writeln(PHP_EOL . 'Updating Hierarchies..');

        foreach ($this->counter as $type => $counter) {
            $output->writeln('<info>Done deleting ' . $type . ' '. $counter['deleted'] . '/' . $counter['total'] . '</info>');
        }

        $question = new ConfirmationQuestion('<question>Do you want me to update staff hierarchies?</question>', true);

        if (!$helper->ask($input, $output, $question)) {
            return;
        }

        $UpdateHierarchyCommand = $this->getApplication()->find('hierarchy');

        $UpdateHierarchyCommand->run(new ArrayInput([
            'command' => 'hierarchy'
        ]), $output);
    }
}
