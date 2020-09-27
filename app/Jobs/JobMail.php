<?php

namespace App\Jobs;

use App\Mail\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail as FacadesMail;

class JobMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    private $paths = array();
    private $mailsubject;
    private $content;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($paths, $mailsubject, $content)
    {
        $this->paths = $paths;
        $this->mailsubject = $mailsubject;
        $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        FacadesMail::send(new Mail($this->paths, $this->mailsubject, $this->content));
    }
}
