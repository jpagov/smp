<?php
namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;

class SlugCommand extends Command
{
    protected function configure()
    {
        $this->setName("slug")
             ->setDescription("Update slug")
             ->addArgument(
                'type',
                InputArgument::IS_ARRAY,
                'Specify type for slugifying. Delimited by space'
             )
             ->setHelp(<<<EOT
Update slug for Staff, Division, Branch, Sector and Unit
EOT
             );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $valid = ['staff', 'division', 'branch', 'sector', 'unit'];

        $alias = [
            'staff' => 'staff',
            'division' => 'bahagian',
            'branch' => 'cawangan',
            'sector' => 'sektor',
            'unit' => 'unit',
        ];

        $default = ['branch'];

        if ($type = $input->getArgument('type') && in_array($type, $valid)) {
            $default = $type;
        }

        $slugify = function ($text = '') {
            $text = str_replace('-', ' ', $text);
            if (str_word_count($text) < 3) {
                return $text;
            }
            return preg_replace('~\b(\w)|.~', '$1', $text);
        };

        foreach ($default as $item) {
            $model = ucfirst($item);

            $query = \Query::table(\Base::table($model::$table));

            $count = $query->count();
            $branchs = $query->get();

            $progress = new ProgressBar($output, 50);
            $progress->start();

            foreach ($branchs as $branch) {
                if (str_word_count($branch->title) > 2 && (strpos(strtolower($branch->title), $alias[$item]) >= 0)) {
                    \Slug::where('title', 'like', $branch->title)
                        ->where('type', '=', 'branch')->delete();

                    \Slug::create(array(
                        'realid' => $branch->id,
                        'title' => $branch->title,
                        'slug' => $branch->slug,
                        'type' => $item,
                    ));

                    $model::update($branch->id, array(
                        'slug' => slug($slugify($branch->title))
                    ));
                }

                $progress->advance();
            }

            $progress->finish();

            $output->writeln(PHP_EOL . PHP_EOL . '<info>Done updating</info> <comment>' . $count . '</comment> <info>' . $model .'</info>');
        }
    }
}
