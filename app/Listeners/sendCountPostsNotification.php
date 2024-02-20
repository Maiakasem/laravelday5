<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendCountPostsNotification
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
    public function handle(countPosts $event): void
    {
        $user = $event->post->user;
        $user->posts_count++;
        $user->save();
    }
}
