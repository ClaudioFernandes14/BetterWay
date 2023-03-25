<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {   
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            return redirect('/');
        }

        $user->sendEmailVerificationNotification();

        
        return view('verificaConta');
    }
}
