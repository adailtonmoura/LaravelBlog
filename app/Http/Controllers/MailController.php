<?php

namespace App\Http\Controllers;

use App\Mail\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    public function teste(Request $request){

        $path = $request->file('file')->store('files');


        FacadesMail::send(new Mail($path));
        return redirect()->route('home')->with('status', 'Email Enviado');

    }
}
