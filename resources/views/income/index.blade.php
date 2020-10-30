@extends('layouts.master')

@section('Income', 'active')

@section('content')
    <h1>Da Venti's Income</h1>
    <table class="table table-hover table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>ID Order</th>
            <th>Status</th>
            <th>Total Payment</th>
        </tr>
        </thead>
        @foreach($data_order as $order)
        <tr>
            <td>{{$order->id_order}}</td>
            <td>{{$order->status}}</td>
            <td>Rp{{$order->payment->total_payment}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2" class="table-dark font-weight-bold">Total Income</td>
            <td class="table-success text-bold font-weight-bold">Rp{{$data_payment}}</td>
        </tr>
    </table>
@endsection