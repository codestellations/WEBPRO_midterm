@extends('layouts.master')

@section('content')
    <!-- flash message -->
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    @if(session('fail'))
        <div class="alert alert-danger" role="alert">
            {{session('fail')}}
        </div>
    @endif
    
    <div class="row">
        <div class="col-6">
            <h1>Order Data</h1>
        </div>

        <!-- Order data table -->
        <table class="table table-hover">
            <tr>
                <th>ID Order</th>
                <th>Order Date</th>
                <th>ID Customer</th>
                <th>ID Payment</th>
                <th>Status</th>
                <th>Update Date</th>
                <th>ID Employee</th>
                <th>Action</th>
            </tr>
            @foreach($data_order as $order)
            <tr>
                <td>{{$order->id_order}}</td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->fk_id_customer}}</td>
                <td>{{$order->fk_id_payment}}</td>
                <td>{{$order->status}}</td>
                <td>{{$order->updated_at}}</td>
                <td>{{$order->fk_id_employee}}</td>
                <td>
                    <a href="/order/{{$order->id_order}}/edit" class="btn btn-info btn-sm">Details</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection