<?php
namespace Smp\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\ProgressBar;

class AdminStaffEmailCommand extends Command
{
    protected function configure()
    {
        $this->setName("admin:email")
             ->setDescription("Send email for validation and confirmation")
             ->addArgument(
                'id',
                InputArgument::IS_ARRAY | InputArgument::OPTIONAL,
                'Filter by Division ID. Separated by space.'
             )
             ->setHelp('Send <info>email</info> for validation and confirmation to staff');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $default = ['id', 'display_name', 'email', 'email', 'telephone','slug'];

        $progress = new ProgressBar($output, 50);
        $progress->start();

        $divisions = $input->getArgument('id') ?
            \Division::where_in('id', $input->getArgument('id'))->get(['id', 'slug', 'title', 'staff']) :
            \Division::listing();

        if (!array_filter($divisions)) {
            $output->writeln('<error>No division found</error>');
            return;
        }

        $count = 0;
        $noavatar = [];

        foreach ($divisions as $division) {
            if ($output->isVerbose()) {
                $output->writeln('<info>=== Getting staff list on ' . $division->title . ' ===</info>');
            }

            $staffs = \Staff::sort('grade', 'desc');

            $staffs->where('division', '=', $division->id)
                ->where('status', '=', 'active')
                ->where('display_name', '!=', '')
                ->where('email', '!=', '');

            $count += $staffs->count();

            $staffs = $staffs->get($default);

            foreach ($staffs as $staff) {

                //if ($staff->id != 487 || $staff->id != 190) {
                if ($confirm = \Confirm::where('staff_id', '=', $staff->id)->get()) {
                    //if ($confirm->confirm_date) {
                    //	continue;
                    //}
                    $progress->getProgress();
                    $progress->advance();
                    $output->writeln(PHP_EOL . '<info>Already sent. Skipped.</info>');

                    continue;
                }

                $token = noise(10);
                $url = 'https://sistem.jpa.gov.my' . \Config::app('url') . '/';
                $profileuri = \Uri::full($url . $staff->slug);
                $confirmuri = \Uri::full($url . 'admin/confirm/' . $token);
                $username = preg_replace("/^([^@]+)(@.*)$/", "$1", $staff->email);
                $amnesiauri = \Uri::full($url . 'admin/amnesia');

                \Confirm::create([
                    'staff_id' => $staff->id,
                    'token' => $token,
                    'created' => \Date::mysql('now')
                ]);

                $emailer = [
                    'to' => $staff->email,
                    'subject' => __('email.confirm_subject'),
                    'message' => \Braces::compile(PATH . 'content/confirm.html', [
                        'title' => __('email.confirm_subject'),
                        'hi' => __('email.hi'),
                        'message_valid' => __('email.confirm_message_valid', $profileuri),
                        'message_confirm' => __('email.confirm_message_confirm', $confirmuri),
                        'message_access' => __('email.confirm_message_access', $username, $amnesiauri),
                        'support' => __('email.confirm_support'),
                        'thanks' => __('email.thanks'),
                        'footer' => __('site.title'),
                    ])
                ];

                $mail = new \Email($emailer);

                if (!$mail->send()) {
                    $output->writeln(PHP_EOL . '<error>Email not sent: ' . $mail->ErrorInfo . '</error>');
                    return;
                } else {
                    $output->writeln(PHP_EOL . '<info>Email sent: ' . $staff->email . '</info>');
                }
            }

            $progress->getProgress();
            $progress->advance();
        }

        $output->writeln(PHP_EOL . 'Sending email to ' . $progress->getProgress() . '/' . $count .' staff');
    }
}
