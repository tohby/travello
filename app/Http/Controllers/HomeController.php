<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

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
        return view('rooms');
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }

    public function reservation() {
        return view('reservation');
    }
}
