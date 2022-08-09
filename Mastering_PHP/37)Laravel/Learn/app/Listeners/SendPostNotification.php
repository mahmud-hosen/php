<?php

namespace App\Listeners;

use App\Events\PostProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\UserMail;
use Mail;

class SendPostNotification
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
     * @param  PostProcessed  $event
     * @return void
     */
    public function handle(PostProcessed $event)
    {
        // \Mail::to('mahmudhossain582@gmail.com')->send(new UserMail($event->post));
        return view('redisTest');
    }
}
