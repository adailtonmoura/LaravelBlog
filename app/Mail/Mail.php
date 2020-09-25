<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mail extends Mailable
{
    use Queueable, SerializesModels;
    private $paths = array();
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($paths)
    {
        $this->paths = $paths;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to('adailton.silva091@academico.ifs.edu.br');
        $this->subject('asd');
        $email = $this->markdown('email');

        foreach ($this->paths as $files) {
            $email->attachFromStorage("$files");
        }
    }
}
