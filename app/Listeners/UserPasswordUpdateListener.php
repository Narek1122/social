<?php

namespace App\Listeners;

use App\Events\UserPasswordUpdateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;

class UserPasswordUpdateListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserPasswordUpdateEvent $event)
    {
        Log::info('User_Password_Update',[
          'id' => $event->user->id,
          'user_email' => $event->user->email,
          'user_name' => $event->user->name,
        ]);
    }
}
