<?php

namespace App\Http\Controllers;

use App\Room;
use App\Booking;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function checkAvailablity(Request $request){
        $this->validate($request, [
            'dateIn' => 'required',
            'dateOut' => 'required',
        ]);
        $dateIn = $request->dateIn;
        $dateOut = $request->dateOut;

        $rooms = Room::whereDoesntHave('bookings', function ($query) use ($dateIn, $dateOut){
            $query->whereDate('endDate', '<', $dateIn)->whereDate('startDate', '>', $dateOut);
        })->paginate(6);

        return view('rooms')->with('rooms', $rooms);
    }

    public function createReservation(Request $request){
        $this->validate($request, [
            'dateIn' => 'required',
            'dateOut' => 'required',
        ]);
    }
}
