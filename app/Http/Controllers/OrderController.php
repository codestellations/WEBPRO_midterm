<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // function to read order
    public function index(Request $request){
        if($request->has('search')){
            $data_order = \App\Models\Order::where('id_order', 'LIKE', '%'.$request->search.'%')->orWhere('status', 'LIKE', '%'.$request->search.'%')->get();
        }
        else{
            $data_order = \App\Models\Order::all();
        }
        return view('order.index', ['data_order' => $data_order]);
    }

    // function to edit order
    public function edit($id_order){
        $order = \App\Models\Order::find($id_order); // find the id and save it to variable order
        return view('order/edit', ['order' => $order]);
    }

    // function to update order
    public function update(Request $request, $id_order){
        $order = \App\Models\Order::find($id_order); // find the id and save it to variable order
        $order->update($request->all()); // update data to database
        return redirect('/order')->with('success', 'Update data success');
    }
}
