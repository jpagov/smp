<?php

namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;

class HierarchyCommand extends Command
{
    protected $valids = ['pkppa', 'pkppap', 'pkppao', 'bkp', 'bppd', 'intan', 'bpms', 'bpps', 'bs', 'bp', 'bk', 'bmi', 'bpo', 'btsa'];
    protected $divisions = [];

    protected function configure()
    {
        $this->setName("hierarchy")
             ->setDescription("Update all staff hierarchy")
             ->addArgument(
                'division',
                InputArgument::IS_ARRAY,
                'Filter by division for updating hierarchy (Delimited by space)',
                $this->valids
             )
             ->addOption('force', 'f', InputOption::VALUE_NONE, 'Force to update all staff. Staff that have null in division, branch, sector, and unit will not update.' . PHP_EOL)
             ->setHelp('Update <info>hierarchy</info> for all staff');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $formatter = $this->getHelper('formatter');
        $filter = false;
        $divisions = \Division::listing();

        foreach ($divisions as $division) {
            $this->divisions[$division->slug] = $division->id;
        }

        $valid = array_intersect($this->valids, $input->getArgument('division'));

        $ids = array_intersect_key($this->divisions, array_flip($valid));

        $query = \Staff::where_in('division', array_values($ids));

        $count = $query->count();
        $staffs = $query->get();

        $progress = new ProgressBar($output, 50);
        $progress->start();

        foreach ($staffs as $staff) {
            $formattedLine = $formatter->formatSection(
                strtoupper(array_search($staff->division, $this->divisions)),
                '<comment>Updating</comment>: ' . $staff->display_name
            );
            $output->writeln($formattedLine);
            \Hierarchy::where('staff', '=', $staff->id)->delete();
            \Hierarchy::create(array(
                'staff' => $staff->id,
                'division' => ($staff->division) ?: 0,
                'branch' => ($staff->branch) ?: 0,
                'sector' => ($staff->sector) ?: 0,
                'unit' => ($staff->unit) ?: 0,
            ));
            $progress->advance();
        }

        $progress->finish();

        $output->writeln(PHP_EOL . PHP_EOL . 'Done updating ' . $count . ' staff');
    }
}
