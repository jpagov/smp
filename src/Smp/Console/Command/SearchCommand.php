<?php
namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;

class SearchCommand extends Command
{
    protected function configure()
    {
        $this->setName("search")
             ->setDescription("Group search report")
             ->setHelp(<<<EOT
Group search table and update search report table
EOT
             );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $table = \Base::table('search_report');

        \DB::ask("TRUNCATE `$table`");

        $progress = new ProgressBar($output, 50);
        $progress->start();

        if ($searchs = \Search::group('search')->sort('total', 'desc')->get_count(['search'], 'search')) {
            foreach ($searchs as $search) {
                \Query::table($table)->insert([
                    'search' => $search->search,
                    'total' => $search->total
                ]);

                $progress->getProgress();
                $progress->advance();
            }
        }

        $output->writeln(PHP_EOL . PHP_EOL . 'Done inserting ' . $progress->getProgress() . ' search');
    }
}
