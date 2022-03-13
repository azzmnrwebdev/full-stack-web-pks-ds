<?php

namespace App\Listeners;

use App\Events\OtpCodeStoredEvent;
use App\Mail\OtpCodeAuthorMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailToOTPCodeAuthor implements ShouldQueue
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
     * @param  OtpCodeStoredEvent  $event
     * @return void
     */
    public function handle(OtpCodeStoredEvent $event)
    {
        Mail::to($event->otp_code->user->email)->send(new OtpCodeAuthorMail($event->otp_code));
    }
}
