<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ApplicationMail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function index()
    {
        return view("frontend.contact.index");
    }
    public function sendMessage(Request $request)
    {
        $email = new ContactMail($request);
        Mail::to("zehrasenakgul@gmail.com")->send($email);
    }
    public function sendApplication(Request $request)
    {
        $email = new ApplicationMail($request);
        Mail::to("zehrasenakgul@gmail.com")->send($email);
    }

    public function application()
    {
        return view("frontend.contact.application");
    }
}
