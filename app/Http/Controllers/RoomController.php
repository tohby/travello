<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // room index
        $rooms = Room::orderBy('created_at', 'desc')->paginate(6);
        return view('admin/rooms/index')->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //show create page
        return view('admin/rooms/create');
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
            'roomNo' => 'required:unique:rooms',
            'name' => 'required:unique:rooms',
            'price' => 'required|numeric',
            'size' => 'required|numeric',
            'capacity' => 'required|numeric',
            'services' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/rooms', $fileNameToStore);
        }

        Room::Create([
            'roomNo' => $request->roomNo,
            'name' => $request->name,
            'price' => $request->price,
            'size' => $request->size,
            'capacity' => $request->capacity,
            'services' => $request->services,
            'description' => $request->description,
            'image' => $fileNameToStore,
        ]);
        return redirect('/admin/rooms')->with('success', 'New room added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('/admin/rooms/view')->with('room', $room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        // return edit page
        return view('admin/rooms/edit')->with('room', $room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $this->validate($request, [
            'roomNo' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'size' => 'required|numeric',
            'capacity' => 'required|numeric',
            'services' => 'required',
            'description' => 'required',
            // 'image' => 'required|image',
        ]);

        if($request->hasFile('image')){
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/rooms', $fileNameToStore);
            $room->image = $fileNameToStore;
        }

        $room->roomNo = $request->roomNo;
        $room->name = $request->name;
        $room->price = $request->price;
        $room->size = $request->size;
        $room->capacity = $request->capacity;
        $room->services = $request->services;
        $room->description = $request->description;
        $room->save();
        return redirect('/admin/rooms')->with('success', 'Room has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect('/admin/rooms')->with('success', 'Room has been removed');
    }
}
