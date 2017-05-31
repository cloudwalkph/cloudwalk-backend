<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\Cmailer;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function mailer(Request $request)
    {
        Mail::to('cloudwalkdigital@gmail.com')->send(new Cmailer($request->all()));
    }

}
