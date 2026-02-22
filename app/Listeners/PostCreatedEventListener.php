<?php

namespace App\Listeners;

use App\Events\PostCreatedEvnet;
use App\Mail\PostStored;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PostCreatedEventListener
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
    public function handle(PostCreatedEvnet $event): void
    {
        Mail::to('hlaing@gmail.com')->send(new PostStored($event->post));
    }
}
