<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reservations()
    {
        $user = Auth::user();

        if (!$user->is_admin) {
            return abort(404);
        }

        return view('reservations', [
            'reservations' => Reservation::with('user')->get()
        ]);
    }
}
