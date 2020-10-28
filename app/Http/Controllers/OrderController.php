<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // function to read order
    public function index(){
        $data_order = \App\Models\Order::all();
        return view('order.index', ['data_order' => $data_order]);
    }

    // function to edit order
    public function edit($id_order){
        $order = \App\Models\Order::find($id_order); // find the id and save it to variable category
        return view('order/edit', ['order' => $order]);
    }

    // function to update order
    public function update(Request $request, $id_order){
        $order = \App\Models\Order::find($id_order); // find the id and save it to variable category
        $order->update($request->all()); // update data to database
        return redirect('/order')->with('success', 'Update data success');
    }
}
