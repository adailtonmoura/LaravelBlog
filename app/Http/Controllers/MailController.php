<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    public function sendMail(MailRequest $request)
    {
            $paths = array();

            for ($i = 0; $i < count($request->allFiles()['files']); $i++) {
                $file = $request->allFiles()['files'][$i];

                $paths[$i] = $file->store('files');
            }

            FacadesMail::send(new Mail($paths));
            return redirect()->route('home')->with('status', 'Email Enviado');
    }
}
