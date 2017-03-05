<?php

namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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
	$fixStaffNameCommand = $this->getApplication()->find('admin:name');

        $fixStaffNameCommand->run(new ArrayInput([
            'command' => 'admin:name'
        ]), new NullOutput);

        $formatter = $this->getHelper('formatter');
        $file = $input->getArgument('file');

        $formattedLine = $formatter->formatSection(
            'EXCEL',
            '<comment>Importing from</comment>: <info>' . $file . '</info>'
        );
        $output->writeln($formattedLine);

        $excels = $this->getExcel($file);

        $table = $this->getTable('imports');

        $counter = 0;

        foreach ($excels as $excel) {
            unset($excel['bil'], $excel['agency']);

            $formattedLine = $formatter->formatSection(
                'MYSQL',
                '<comment>Importing</comment>: ' . $excel['ic'] . ' - '. $excel['nama']
            );

            $output->writeln($formattedLine);

            $fields = [4 => 'division', 5 => 'branch', 6 => 'sector', 7 => 'unit'];

            $fetch = array_merge(['id', 'display_name'], array_values($fields));

            $import = \Import::create($excel);

            $nama = str_replace([' BIN ', ' BINTI '], '%', $import->nama);

            if ($staff = \Staff::where('status', '=', 'active')->where('display_name', 'like', '%' . $nama . '%')->fetch($fetch)) {

		$formattedLine = $formatter->formatSection(
	                'MATCH',
	                '<comment>' . $import->nama . '</comment>: ' . $staff->display_name
	            );
		$output->writeln($formattedLine);

		$organization = [];

		foreach ($fields as $key => $model) {

			$bu = 'bulevel' . $key;

			if (in_array($import->{$bu}, $organization) ) {
				$staff->{$model} = 0;
				continue;
			}

			if ( $import->{$bu} && strpos($import->{$bu}, 'JAWATAN KUMPULAN') === false ) {
						$staff->{$model} = $this->id($import->{$bu}, $model);
					}

					$organization[] = $import->{$bu};
		}

                $staff->ic = $import->ic;
                $staff->last_visit = null;
                $staff->updated = \Date::mysql('now');

				$staff->save();
            }

            $counter++;
        }

        $output->writeln(PHP_EOL . '<info>Done importing ' . $counter. ' staff to ' . $table . '</info>');
    }

    protected function getTable($table)
    {
	$table = \Base::table('imports');

        if (!$this->has_table($table)) {
		$sql = "CREATE TABLE `ed_imports` (
						`id` int(11) NOT NULL AUTO_INCREMENT,
						`nama` varchar(250) DEFAULT NULL,
						`emel` varchar(150) DEFAULT NULL,
						`ic` varchar(50) DEFAULT NULL,
						`tel` varchar(50) DEFAULT NULL,
						`buid` int(6) DEFAULT NULL,
						`buparentid` int(6) DEFAULT NULL,
						`bulevel3` varchar(250) DEFAULT NULL,
						`bulevel4` varchar(250) DEFAULT NULL,
						`bulevel5` varchar(250) DEFAULT NULL,
						`bulevel6` varchar(250) DEFAULT NULL,
						`bulevel7` varchar(250) DEFAULT NULL,
					     PRIMARY KEY (`id`)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

			\DB::ask($sql);

        } else {
		\DB::ask("TRUNCATE `$table`");
        }

        return $table;
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

    function ucname($string) {

	preg_match('#\((.*?)\)#', $string, $match);

	$text = '';

	if ($match) {
		$string = str_replace($match[0], '', $string);
		$text = strtoupper($match[0]);
	}

		$string = ucwords(strtolower($string));

		foreach (array('-', '\'', '(', ')') as $delimiter) {
			if (strpos($string, $delimiter)!==false) {
				$string =implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
			}
		}

		return $string . " $text";
	}

    protected function id($term, $model = 'division')
    {
	$model = ucfirst($model);

        return $model::id($this->ucname($term));
    }

    protected function has_table($table) {
		$default = \Config::db('default');
		$db = \Config::db('connections.' . $default . '.database');

		$sql = 'SHOW TABLES FROM `' . $db . '`';
		list($result, $statement) = \DB::ask($sql);
		$statement->setFetchMode(\PDO::FETCH_NUM);

		$tables = array();

		foreach($statement->fetchAll() as $row) {
			$tables[] = $row[0];
		}

		return in_array($table, $tables);
	}

}
