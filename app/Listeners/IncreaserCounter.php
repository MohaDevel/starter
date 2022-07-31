<?php

namespace App\Listeners;


use App\Events\videoViwere;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaserCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(videoViwere $viewer)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(videoViwere $event)
    {
        //
        $this->updateViewer($event->vedio);
    }


    public function updateViewer($video){
        $video->viewer=$video->viewer+1;
        $video->save();
    }
}
