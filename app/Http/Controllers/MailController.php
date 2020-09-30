<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Jobs\JobMail;
use App\Mail\Mail;

class MailController extends Controller
{
    public function sendMail(MailRequest $request)
    {

        $paths = array();

        for ($i = 0; $i < count($request->allFiles()['files']); $i++) {
            $file = $request->allFiles()['files'][$i];
            $paths[$i] = $file->store('files');
        }

        JobMail::dispatch($paths,$request->mailsubject,$request->content)->delay(now()->addSeconds(15));
        return redirect()->route('home')->with('status', 'Email Enviado');
    }
}
