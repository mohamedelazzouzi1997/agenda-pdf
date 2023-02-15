<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use App\Mail\EventNotify;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EventNotifyCommande extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Event:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify User by their tasks';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $Two_days_befor = Carbon::now()->addDays(2)->toDateString();
       $Four_days_befor = Carbon::now()->addDays(4)->toDateString();

            $Users = User::with(['events'=> function($q) use($Four_days_befor,$Two_days_befor){
                $q->whereIn('status', ['En attente'])
                ->whereDate( 'start', $Two_days_befor)
                ->orWhereDate( 'start', $Four_days_befor);
            }])->get();

            foreach ($Users as $user) {
                if($user->events->count()){
                    Mail::to($user->email)->send(new EventNotify($user));
                }
            }
    }
}