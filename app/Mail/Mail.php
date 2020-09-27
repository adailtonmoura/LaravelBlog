<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mail extends Mailable
{
    use Queueable, SerializesModels;
    private $paths = array();
    private $mailsubject;
    private $content;
    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to('adailton.silva091@academico.ifs.edu.br');
        $this->subject($this->mailsubject);

        $email = $this->markdown('email');

        foreach ($this->paths as $files) {
            $email->attachFromStorage("$files");
        }
    }
}
