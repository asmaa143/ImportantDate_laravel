<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\User;
use App\Notifications\Api\RemindersNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use Notification;

class EventReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Notification to all users before user event';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $events=Event::all();

        foreach ($events as $event){
            foreach ($event->reminder_dates as $date){
                if($date->format('y-m-d') == Carbon::now()->format('y-m-d')){
                    Notification::send($event->user, new RemindersNotification($event));
                }
            }
        }

        $this->info('Reminder of the Day sent to All Users');
    }

}
