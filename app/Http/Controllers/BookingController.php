<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(12);
        return view('admin/bookings/index')->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'dateIn' => 'required',
            'dateOut' => 'required',
        ]);

        $bookings = Booking::where('roomId', $request->roomId)->whereDate('startDate', '<=', Carbon::create($request->dateOut))->whereDate('endDate', '>=', Carbon::create($request->dateIn))->get();

        if(count($bookings) > 0) {
            return back()->with('error', 'Room is booked alrady! Please check other rooms');
        }else{
            $booking = Booking::Create([
                'roomId' => $request->roomId,
                'userId' => Auth::id(),
                'startDate' => Carbon::create($request->dateIn),
                'endDate' => Carbon::create($request->dateOut),
            ]);
            $room = Room::find($request->roomId);
            return redirect('/reservation/pay')->with('room', $room)->with('booking', $booking)->with('success', 'Your reservation has been sent! Please provide payment details below. Thank you.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);
        $message =  $request->status === 1 ? 'Booking has been confirmed successfully' : 'Booking has been cancelled';

        $booking->status = $request->status;
        $booking->save();
        return back()->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
