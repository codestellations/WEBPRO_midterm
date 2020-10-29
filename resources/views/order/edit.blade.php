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

    <!-- Book List -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-6">
                <h2>Book List</h2>
            </div>
             <!-- Book table -->
            <table class="table table-hover">
                <tr>
                    <th>ID Book</th>
                    <th>Book Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount Percentage</th>
                </tr>
                @foreach($order->book as $book)
                <tr>
                    <td>{{$book->id_book}}</td>
                    <td>{{$book->name_book}}</td>
                    <td>{{$book->category->name_category}}</td>
                    <td>{{$book->price_book}}</td>
                    @if($book->fk_id_promo != null)
                        <td>{{($book->promo->discount)*100}}</td>
                    @else
                        <td>-</td>
                    @endif
                </tr>
                @endforeach

            </table>
        </div>
    </div>

    <!-- Order Details -->
    <div class="col-6">
        <h2>Order Details</h2>
    </div>
    <form action="/order/{{$order->id_order}}/update" method="post">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="idOrder" class="col-sm-2 col-form-label">ID Order</label>
            <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="idOrder" value="{{$order->id_order}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="dateOrder" class="col-sm-2 col-form-label">Order Date</label>
            <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="dateOrder" value="{{$order->created_at}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="idCust" class="col-sm-2 col-form-label">ID Customer</label>
            <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="idCust" value="{{$order->customer->id_customer}}">
            </div>
        </div>
        <div class="form-group row">
            <label for="nameCust" class="col-sm-2 col-form-label">Customer Name</label>
            <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="idCust" value="{{$order->customer->name_customer}}">
            </div>
        </div>
        @if($order->fk_id_payment != null)
            <div class="form-group row">
                <label for="idPay" class="col-sm-2 col-form-label">ID Payment</label>
                <div class="col-sm-6">
                    <input type="text" readonly class="form-control-plaintext" id="idPay" value="{{$order->payment->id_payment}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="subtotal" class="col-sm-2 col-form-label">Subtotal</label>
                <div class="col-sm-6">
                    <input type="text" readonly class="form-control-plaintext" id="subtotal" value="{{$order->payment->subtotal}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="total" class="col-sm-2 col-form-label">Total Payment</label>
                <div class="col-sm-6">
                    <input type="text" readonly class="form-control-plaintext" id="total" value="{{$order->payment->total_payment}}">
                </div>
            </div>
        @endif
        <div class="form-group row">
            <label for="updateStat" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-8">
                @if($order->status == 'payment received' || $order->status == 'order processed')
                    <select name="status" class="form-control" id="updateStat">
                        <option value="payment received" @if($order->status == 'payment received') selected @endif>payment received</option>
                        <option value="order processed" @if($order->status == 'order processed') selected @endif>order processed</option>
                        <option value="order sent" @if($order->status == 'order sent') selected @endif>order sent</option>
                    </select>
                @else
                    <input type="text" readonly class="form-control-plaintext" id="status" value="{{$order->status}}">
                @endif
            </div>
            @if($order->status == 'payment received' || $order->status == 'order processed')
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-warning float-right">Update</button>
                </div>
            @endif
        </div>     
    </form>
@endsection