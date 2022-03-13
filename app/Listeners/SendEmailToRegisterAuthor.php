<?php

namespace App\Listeners;

use App\Events\RegisterStoredEvent;
use App\Mail\RegisterAuthorMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToRegisterAuthor implements ShouldQueue
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
     * @param  RegisterStoredEvent  $event
     * @return void
     */
    public function handle(RegisterStoredEvent $event)
    {
        Mail::to($event->user->email)->send(new RegisterAuthorMail($event->user));
    }
}
