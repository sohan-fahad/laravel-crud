<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AttachedMail;

class MailController extends Controller
{
    function mail() {
        return view('mail');
    }
    function send(Request $request) {

        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'sub'=> $request->sub,
            'file' => $request->file('file'),
        ];
        // dd($data);

        $sender = "sohan44512@gmail.com";
        \Mail::to($sender)->send(new AttachedMail($data));
        return "Mail Has Been Send Successfully";
    }
}
