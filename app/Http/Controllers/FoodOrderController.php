<?php

namespace App\Http\Controllers;

use App\User;
use App\Food;
use App\FoodOrder;
use Illuminate\Http\Request;

class FoodOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = FoodOrder::orderBy('created_at', 'desc')->paginate(12);
        return view('admin/foodOrder/index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foods = Food::orderBy('name', 'asc')->get();
        $users = User::where('role', 1)->orderBy('name', 'asc')->get();
        return view('admin/foodOrder/create')->with('users', $users)->with('foods', $foods);
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
            'user' => 'required',
            'food' => 'required',
            'plates' => 'required',
        ]);

        FoodOrder::Create([
            'userId' => $request->user,
            'foodId' => $request->food,
            'plates' => $request->plates
        ]);

        return redirect('/admin/food-order')->with('success', 'Order has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FoodOrder  $foodOrder
     * @return \Illuminate\Http\Response
     */
    public function show(FoodOrder $foodOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FoodOrder  $foodOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodOrder $foodOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FoodOrder  $foodOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodOrder $foodOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FoodOrder  $foodOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodOrder $foodOrder)
    {
        //
    }
}
