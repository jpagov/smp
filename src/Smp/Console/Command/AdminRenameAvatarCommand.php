<?php
namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class AdminRenameAvatarCommand extends Command {
	protected function configure() {
		$this->setName("admin:fix")
			 ->setDescription("Fix or remove profile avatar filename")
			 ->addArgument(
				'id',
				InputArgument::IS_ARRAY | InputArgument::OPTIONAL,
				'Filter by Division ID. Separated by space.'
			 )
			 ->addOption('remove', 'r', InputOption::VALUE_NONE, 'Remove avatar that not link to staff.' . PHP_EOL)
			 ->addOption('what', 'w', InputOption::VALUE_NONE, 'Dry run to see what change.' . PHP_EOL)

			 ->setHelp('<info>Fix or remove</info> profile avatar filename');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {

		$table = \Base::table('staff_meta');
		$path = PATH . 'content' . DS;
		$avatarpath = $path . 'avatar' . DS;
		$fix = 0;

		if ($remove = $input->getOption('remove')) {

			$dir = new \DirectoryIterator($avatarpath);
			foreach ($dir as $fileinfo) {
				if ( preg_match("/[A-Z]|\s/", $fileinfo->getFilename())) {
					echo PHP_EOL . $fileinfo->getPathname();
					if ($input->getOption('what')) {
						rename($fileinfo->getPathname(), $avatarpath .  'original' . DS . $fileinfo->getBasename());
					}

				}
			}

			return;
		}

		$default = ['id', 'display_name', 'email', 'position', 'email', 'telephone'];

		$divisions = $input->getArgument('id') ?
			\Division::where_in('id', $input->getArgument('id'))->get(['id', 'slug', 'title', 'staff']) :
			\Division::listing();

		$staffs = \Staff::sort('grade', 'desc');

		$divid = [];
		foreach ($divisions as $division) {
			$divid[] = $division->id;
		}
		if ($divisions) {
			$staffs->where_in('division', $divid, 'AND ');
		}
		$staffs->where('status', '=', 'active')
			->where('display_name', '!=', '');

		$count = $staffs->count();

		$staffs = $staffs->get($default);

		foreach ($staffs as $staff) {

			if($extend = \Extend::field('staff', 'avatar', $staff->id)) {
				$avatar = \Extend::value($extend);
				$avatar_path = $avatarpath .  $avatar;

				if ( preg_match("/[A-Z]|\s/", $avatar)) {
					//if (strtolower($avatar) != $avatar){}
					//print_r($extend->value);
					//continue;

					$newname = preg_replace( "/^([^@]+)(@.*)$/", "$1", $staff->email) . '.jpg';

					// rename avatar to lowercase
					if (is_readable($avatar_path)) {

						if ($input->getOption('what')) {

							$output->writeln(PHP_EOL . '=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=' . PHP_EOL .'<info>Rename ' . $avatar_path . ' => ' . $avatarpath .  $newname .'</info>');

						} else {
							rename($avatar_path, $avatarpath .  $newname);
						}
					}

					// and update staff meta accordingly
					$name = $filename = strtolower($newname);
					$json = \Json::encode(compact('name', 'filename'));



					$sql = 'UPDATE `' . $table . '` SET `data` = '. "'" . $json . "'" .' WHERE `' . $table . '`.`extend` = ' . $extend->id . ' AND `' . $table . '`.`staff` = ' . $staff->id;

					//echo PHP_EOL . $sql;
					if ($input->getOption('what')) {
						$output->writeln('<info>Update staff meta from: ' . PHP_EOL . '    ' . \Json::encode($extend->value) . PHP_EOL . ' to : ' . PHP_EOL . '    ' . strtolower($json) .'</info>');
					} else {
						\DB::ask($sql);
					}
					$fix++;
				}

			}

		}

		$output->writeln(PHP_EOL .'<info>Done updating: '. $fix .'/' . $count. ' staff</info>');

	}
}
