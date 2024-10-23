<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOTPEventListener
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
    public function handle(object $event): void
    {
        // Memastikan bahwa user memiliki activeOTP
        if($event->user->activeOTP) {
            // Mengirim notifikasi OTP
           $event->user->notify(new SendOTPNotification($event->user->activeOTP->otp_code));
        }
    
    }
}
