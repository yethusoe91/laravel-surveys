<?php

namespace App\Listeners;

use App\Events\FormSubmitted;
use App\Mail\FormSubmittedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendFormSubmittedNotification
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
    public function handle(FormSubmitted $event): void
    {
        Mail::to("mr.yethusoe@gmail.com")->send(new FormSubmittedNotification($event->submitData));
    }
}
