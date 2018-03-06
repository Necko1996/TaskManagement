<?php

namespace App\Http\Controllers;

use Lang;
use App\UserConfirmation;
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
     * @param  \App\UserConfirmation $userConfirmation
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(UserConfirmation $user_confirmation)
    {
        $user_confirmation->update([
            'verified' => 1,
        ]);

        session()->flash('success-message', Lang::get('auth.successConfirmation'));

        return redirect()->route('dashboard');
    }
}
