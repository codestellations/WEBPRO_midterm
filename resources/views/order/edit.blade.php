@extends('layouts.master')

@section('content')
    <h1>Order Details</h1>
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

    <!-- Order details, what books are ordered, etc. -->
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <tr>
                    <td>ID Order</td>
                    <td>{{$order->id_order}}</td>
                </tr>
                <tr>
                    <td>ID Customer</td>
                    <td>{{$order->fk_id_customer}}</td>
                </tr>
            </table>

            <!-- update status order form -->
            @if($order->status == 'payment received' || $order->status == 'order processed')
                <form action="/order/{{$order->id_order}}/update" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="updateFormControlSelect1">Update Status</label>
                        <select name="status" class="form-control" id="updateFormControlSelect1">
                            <option value="payment received" @if($order->status == 'payment received') selected @endif>payment received</option>
                            <option value="order processed" @if($order->status == 'order processed') selected @endif>order processed</option>
                            <option value="order sent" @if($order->status == 'order sent') selected @endif>order sent</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            @endif
        </div>
    </div>
@endsection