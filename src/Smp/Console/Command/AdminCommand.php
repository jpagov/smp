<?php
namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;


class AdminCommand extends Command {
	protected function configure() {
		$this->setName("admin:add")
			 ->setDescription("Make admin to staff")
			 ->addArgument(
				'id',
				InputArgument::IS_ARRAY | InputArgument::REQUIRED,
				'Filter by staff ID. Separated by space.'
			 )
			 ->addOption('type', 't', InputOption::VALUE_OPTIONAL, 'Type of admin. [administrator, editor, staff]')
			 ->addOption('roles', 'r', InputOption::VALUE_IS_ARRAY | InputOption::VALUE_OPTIONAL, 'Division roles of admin. Accept division ID only')
			 ->addOption('passwd', 'p', InputOption::VALUE_OPTIONAL, 'Set password.' . PHP_EOL)
			 ->addOption('force', 'f', InputOption::VALUE_NONE, 'Force re-add for existing admin.' . PHP_EOL)
			 ->setHelp('Make <info>admin</info> for staff');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {

		// Asking for credential
		$helper = $this->getHelper('question');

		$qs = new Question('Username: ');
		$username = $helper->ask($input, $output, $qs);

		$qs = new Question('Password: ');
		$qs->setHidden(true);
		$qs->setHiddenFallback(false);
		$password = $helper->ask($input, $output, $qs);

		$attempt = \Auth::attempt($username, $password);

		if( ! $attempt ) {
			$output->writeln('<error>' . __('users.login_error') . '</error>');
			return;
		}

		$progress = new ProgressBar($output, 50);
		$progress->start();

		$count = count($input->getArgument('id'));

		foreach ($input->getArgument('id') as $id) {

			$staff = \Staff::find($id);

			if (!$input->getOption('force')) {
				if ($staff->account) {
					$output->writeln('<error>' . __('users.already_admin') . '</error>');
					$progress->getProgress();
					$progress->advance();
					return;
				}
			}

			if (!$type = $input->getOption('type')) {
				$qs = new ChoiceQuestion(
					'What type of this admin (defaults to staff): ',
					['administrator', 'editor', 'staff'],
					2
				);

				$qs->setErrorMessage('Type %s is invalid.');
				$type = $helper->ask($input, $output, $qs);
			}

			if ($output->isVerbose()) {
				$output->writeln('<info>Setup admin username and password</info>');
			}

			$username = preg_replace( "/^([^@]+)(@.*)$/", "$1", $staff->email);

			if (!$pass = $input->getOption('passwd')) {
				$pass = \Hash::make($username);
			}

			if (!$roles = $input->getOption('roles')) {

				if ($output->isVerbose()) {
					$output->writeln('<info>Setup admin roles</info>');
				}

				$roles = [$staff->division];
			}

			//dd($staff->id, $username, $pass, $roles);

			\Staff::update($staff->id, array(
				'account' => 1,
				'role' => $type,
				'username' => $username,
				'password' => $pass
			));


			\Role::where('staff', '=', $staff->id)->delete();

			foreach ($roles as $role) {
				\Role::create([
					'staff' => $staff->id,
					'division' => $role,
				]);
			}

			$progress->getProgress();
			$progress->advance();
		}

		$output->writeln(PHP_EOL . PHP_EOL . 'Done updating ' . $progress->getProgress() . '/' . $count .' staff');
	}
}
