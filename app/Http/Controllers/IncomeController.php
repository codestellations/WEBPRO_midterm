<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_order = \App\Models\Order::select('id_order', 'status')->whereIn('status', ['payment received', 'order sent', 'order processed'])->get();
        $id_order = \App\Models\Order::select('id_order')->whereIn('status', ['payment received', 'order sent', 'order processed'])->get();
        $data_payment = \App\Models\Payment::whereIn('fk_id_order', $id_order)->sum('total_payment');

        return view('income.index', ['data_order' => $data_order, 'data_payment' => $data_payment]);
    }
}
