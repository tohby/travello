<?php

namespace App\Http\Controllers;

use Auth;
use App\Room;
use App\Food;
use App\FoodOrder;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $rooms = Room::get(4);
        return view('admin/index');
    }

    public function home() {
        return view('home');
    }

    public function welcome() {
        $rooms = Room::orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome')->with('rooms', $rooms);
    }

    public function rooms() {
        $rooms = Room::orderBy('created_at', 'desc')->paginate(6);
        return view('rooms')->with('rooms', $rooms);
    }

    public function roomDetail($id) {
        $room = Room::find($id);
        return view('room-details')->with('room', $room);
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }

    public function food() {
        $foods = Food::orderBy('name', 'asc')->get();
        return view('food')->with('foods', $foods);
    }

    public function foodOrder(Request $request) {
        $this->validate($request, [
            'food' => 'required',
            'plates' => 'required',
        ]);

        FoodOrder::Create([
            'userId' => Auth::id(),
            'foodId' => $request->food,
            'plates' => $request->plates
        ]);

        return redirect('/food')->with('success', 'Order has been created');
    }

    public function reservation() {
        return view('reservation');
    }

    public function pay(){
        return view('pay');
    }

    public function checkout(Request $request){
        $price = $request->price * $request->days;
        $charge = Stripe::charges()->create([
            'amount' => $price,
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Order',
            'receipt_email' => Auth::user()->email,
        ]);

        return redirect('/')->with('success', 'Your invoice has been paid');
    }
}
