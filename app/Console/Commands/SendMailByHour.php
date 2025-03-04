<?php

namespace App\Console\Commands;

use App\Contracts\UserRepositoryInterface;
use App\Mail\Greetings;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class SendMailByHour extends Command
{
    private $userRepository;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail {hour=17}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to send a Greeting mail to all users which hour is the one specified on their timezone';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $hour = $this->argument('hour');
        $this->info('I will send mails to users in timezones where the current hour is (24 hour format): '.$hour);

        $this->userRepository = app(UserRepositoryInterface::class);
        $timezones = getTimeZonesByHour($hour);

        $recipients = $this->getRecipients($timezones);

        if ($recipients->count() > 0) {
            $this->info('Sending mails to: ' . implode(', ', $recipients->pluck('email')->all()));
            try {
                $recipients->each(function ($user) {
                    Mail::to($user->email)->send(new Greetings($user));
                });
            } catch (\Throwable $e) {
                $this->error($e->getMessage());
            }
        } else {
            $this->info('No recipients available');
        }

        return 0;
    }

    private function getRecipients(array $timezones): Collection
    {
        if (count($timezones) > 0) {
            return $this->userRepository->getByTimezones($timezones);
        }

        return collect([]);
    }
}
