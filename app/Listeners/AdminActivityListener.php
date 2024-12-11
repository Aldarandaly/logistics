<?php

namespace App\Listeners;

use App\Events\AdminActivityEvent;
use App\Models\UserActivity;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;


class AdminActivityListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AdminActivityEvent $event)
    {
        UserActivity::create([
            'activity' => $event->message,
        ]);
    }
}
