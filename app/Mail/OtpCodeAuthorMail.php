<?php

namespace App\Mail;

use App\OtpCode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpCodeAuthorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp_code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OtpCode $otp_code)
    {
        $this->otp_code = $otp_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.auth.otpCode_author_mail')
            ->subject('Regenerate OTP Code is Successfully');
    }
}
