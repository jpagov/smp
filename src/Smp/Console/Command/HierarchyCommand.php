<?php
namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;


class HierarchyCommand extends Command {
	protected function configure() {
		$this->setName("hierarchy")
			 ->setDescription("Update all staff hierarchy")
			 ->addArgument(
				'division',
				InputArgument::IS_ARRAY,
				'Filter by division for updating hierarchy. Can use division id or slug. Delimited by space'
			 )
			 ->addOption('force', 'f', InputOption::VALUE_NONE, 'Force to update all staff. Staff that have null in division, branch, sector, and unit will not update.' . PHP_EOL)
			 ->setHelp('Update <info>hierarchy</info> for all staff');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {

		$filter = false;
		$defaults = \Division::listing();
		$id = array();

		if ($input = $input->getArgument('division')) {
			$defaults = $input;
			$filter = true;

			foreach ($defaults as $div) {

				if (!ctype_digit($div)) {
					if (!$division = \Division::slug($div)) {
						$output->writeln('<error>No division found!</error>');
						return;
					}
				}

				$id[] = $division->id;
			}
		}

		$query = \Staff::where('status', '=', 'active')
			->where('division', '!=', 0)
			->where('branch', '!=', 0)
			->where('sector', '!=', 0)
			->where('unit', '!=', 0);

		if ($filter) {
			$query->where_in('division', $id, 'AND ');
		}

		$count = $query->count();
		$staffs = $query->get();

		$progress = new ProgressBar($output, 50);
		$progress->start();

		foreach ($staffs as $staff) {

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
