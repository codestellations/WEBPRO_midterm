@extends('layouts.master')

@section('Promo', 'active')

@section('content')
    <h1>Update Data Promo</h1>
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
    
    <!-- update data promo form -->
    <div class="row">
        <div class="col-lg-12">
            <form action="/promo/{{$promo->id_promo}}/update" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="InputPromoName">Promo Name</label>
                    <input name="name_promo" type="text" class="form-control" id="InputPromoName" value="{{$promo->name_promo}}" required>
                </div>
                <div class="form-group">
                    <label for="InputDiscount">Discount</label>
                <input name="discount" type="number" step="any" class="form-control" id="InputDiscount" placeholder="Discount in decimal eg. 0.1 for 10%" value="{{$promo->discount}}" required>
                </div>
                <div class="form-group">
                    <label for="InputStart">Promo Start</label>
                    <input name="start_discount" type="date" class="form-control" id="InputStart" placeholder="Promo Start" value="{{$promo->start_discount}}" required>
                </div>
                <div class="form-group">
                    <label for="InputStart">Promo End</label>
                    <input name="end_discount" type="date" class="form-control" id="InputEnd" placeholder="Promo End" value="{{$promo->end_discount}}" required>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
@endsection