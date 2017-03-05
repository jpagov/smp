<?php
namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;

class AdminStaffFixNameCommand extends Command
{
    protected function configure()
    {
        $this->setName("admin:name")
             ->setDescription("Re-format staff name")
             ->addArgument(
                'type',
                InputArgument::IS_ARRAY,
                'Specify type for slugifying. Delimited by space'
             )
             ->setHelp(<<<EOT
Remove double space
EOT
             );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
	$formatter = $this->getHelper('formatter');
        $staffs = \Staff::where('display_name', 'like', '%  %')->get();

        foreach ($staffs as $staff) {
            $output->writeln($formattedLine);

		$staff->display_name = str_replace('  ', '', $staff->display_name);
		$staff->save();
		$formattedLine = $formatter->formatSection(
                'MATCH',
                '<comment>Replace</comment>: ' . $staff->display_name
            );
            $output->writeln($formattedLine);
        }
    }
}
