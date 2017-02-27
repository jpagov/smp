<?php

namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;

class AdminImportCommand extends Command
{
    protected $filepath = PATH . 'content';
    protected $headings = [];
    protected $imports = [];

    protected function configure()
    {
        $this->setName("admin:import")
            ->setDescription("Import HRMIS data from external and update staff profile and hierarchy")
            ->addArgument(
                'file',
                InputArgument::OPTIONAL,
                'Path to file. Default all. `branch`, `sector` or `unit`. (separate multiple names with a space)',
                $this->filepath . DS . 'jpa.xlsx'
             )
            ->setHelp('Import <info>HRMIS</info> via external document, mapping and update if necessary');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $formatter = $this->getHelper('formatter');
        $file = $input->getArgument('file');

        $formattedLine = $formatter->formatSection(
            'EXCEL',
            '<comment>Importing from</comment>: <info>' . $file . '</info>'
        );
        $output->writeln($formattedLine);

        $excels = $this->getExcel($file);

        $table = \Base::table('imports');
        \DB::ask("TRUNCATE `$table`");

        $counter = 0;

        foreach ($excels as $excel) {
            unset($excel['bil'], $excel['agency']);

            $formattedLine = $formatter->formatSection(
                'MYSQL',
                '<comment>Importing</comment>: ' . $excel['ic'] . ' - '. $excel['nama']
            );

            $output->writeln($formattedLine);

            $import = \Import::create($excel);

            if ($staff = \Staff::where('status', '=', 'active')->where('display_name', 'REGEXP', $import->nama, true)->fetch()) {
                $staff->ic = $import->ic;
                $staff->last_visit = null;
                $staff->updated = \Date::mysql('now');
                $staff->save();
            }

            $counter++;
        }

        $output->writeln(PHP_EOL . '<info>Done importing ' . $counter. ' staff to ' . $table . '</info>');
    }

    protected function getExcel($path)
    {
        $objPHPExcel = \PHPExcel_IOFactory::load($path);
        $sheet = $objPHPExcel->getActiveSheet();
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $headings = $sheet->rangeToArray('A1:' . $highestColumn . 1, null, true, false);

        $this->headings = array_fill_keys($headings[0], []);

        $this->headings = array_keys($this->headings);

        $datas = [];

        for ($row = 2; $row <= $highestRow; $row++) {
            //  Read a row of datas into an array
            $datas[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false);
        }

        foreach ($datas as $data) {
            //dd($this->headings, array_filter($data[0]));
            $this->imports[] = array_combine($this->headings, $data[0]);
        }

        foreach ($this->imports as $i => $v) {
            foreach ($v as $key => $value) {
                if (empty($key)) {
                    unset($this->imports[$i][$key]);
                }
            }
        }

        return $this->imports;
    }

    protected function array_group_by(array $array, $key)
    {
        if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key)) {
            trigger_error('array_group_by(): The key should be a string, an integer, or a callback', E_USER_ERROR);

            return null;
        }
        $func = (is_callable($key) ? $key : null);
        $_key = $key;
        // Load the new array, splitting by the target key
        $grouped = [];
        foreach ($array as $value) {
            if (is_callable($func)) {
                $key = call_user_func($func, $value);
            } elseif (is_object($value) && isset($value->{$_key})) {
                $key = $value->{$_key};
            } elseif (isset($value[$_key])) {
                $key = $value[$_key];
            } else {
                continue;
            }
            $grouped[$key][] = $value;
        }
        // Recursively build a nested grouping if more parameters are supplied
        // Each grouped array value is grouped according to the next sequential key
        if (func_num_args() > 2) {
            $args = func_get_args();
            foreach ($grouped as $key => $value) {
                $params = array_merge([ $value ], array_slice($args, 2, func_num_args()));
                $grouped[$key] = call_user_func_array('array_group_by', $params);
            }
        }

        return $grouped;
    }
}
