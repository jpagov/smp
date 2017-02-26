<?php
namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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
        $output->writeln(PHP_EOL);

        foreach ($this->counter as $type => $counter) {
            $output->writeln('<info>Done deleting ' . $type . ' '. $counter['deleted'] . '/' . $counter['total'] . '</info>');
        }
    }
}
