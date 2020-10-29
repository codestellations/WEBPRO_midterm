@extends('layouts.master')

@section('Order', 'active')

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
        <div class="col-6">
            <form class="form-inline my-2 my-lg-0 float-right" method="GET" action="/order">
                <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search by ID or status" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>  
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
                <td>
                    <a href="/order/{{$order->id_order}}/edit" class="btn btn-info btn-sm">Details</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection