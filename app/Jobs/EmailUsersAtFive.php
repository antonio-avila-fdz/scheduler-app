<?php

namespace App\Jobs;

use App\Contracts\UserRepositoryInterface;
use App\Mail\Greetings;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailUsersAtFive implements ShouldQueue
{
    use Queueable, SerializesModels;

    private UserRepositoryInterface $userRepository;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {   
        $this->userRepository = app(UserRepositoryInterface::class);
        $timezones = $this->getTimezonesWithSpecificHour(17);
        Log::info($timezones);
        $recipients = $this->getRecipients($timezones);

        if ($recipients->count() > 0) {
           try {
            $recipients->each(function($user) {
                Mail::to($user->email)->send(new Greetings($user));
            });

           } catch(\Throwable $e) {
                Log::error($e->getMessage());
           }
        }

        return;
    }

    private function getRecipients(array $timezones): Collection {
        if (count($timezones) > 0) {
            return $this->userRepository->getByTimezones($timezones);
        }

        return collect([]);
    }

    private function getTimezonesWithSpecificHour(int $hour): array {
        $timezonesForMails = [];

        foreach (\DateTimeZone::listIdentifiers() as $tz) {
            $time = Carbon::now($tz);

            if ($time->hour === $hour) {
                $timezonesForMails[] = $tz;
            }
        }

        return $timezonesForMails;
    }
}
