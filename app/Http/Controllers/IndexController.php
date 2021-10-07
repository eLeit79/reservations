<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{


    public function welcome()
    {
        $loggedIn = Auth::check();

        return view('welcome', [
            'loggedIn' => $loggedIn,
            'userName' => $loggedIn ? Auth::user()->name : ''
        ]);
    }
}
