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
    protected $description = 'Event Notify';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $value = Carbon::now()->addDays(3)->toDateString();

            $Users = User::with(['events'=> function($q) use($value){
                $q->whereiN('status', ['Valide','Rejete','En attente'])
                ->whereDate( 'start', $value);
            }])->get();

            foreach ($Users as $user) {
                Mail::to($user->email)->send(new EventNotify($user));
            }
    }
}