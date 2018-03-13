<?php

namespace App\Http\Controllers;

use Lang;
use App\UserVerification;
use Illuminate\Http\Request;

class UserConfirmationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\UserVerification $user_verification
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(UserVerification $user_verification)
    {
        $user_verification->update([
            'verified' => 1,
        ]);

        session()->flash('success-message', Lang::get('auth.successVerification'));

        return redirect()->route('dashboard');
    }
}
