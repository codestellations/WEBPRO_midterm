@extends('layouts.master')

@section('Promo', 'active')

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
            <h1>Promo List</h1>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right mt-2" data-toggle="modal" data-target="#addPromo">
            Add new promo
            </button>
        </div>
    </div>

        <!-- Category data table -->
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID Promo</th>
                    <th>Promo Name</th>
                    <th>Discount</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_promo as $promo)
                    <tr>
                        <td>{{$promo->id_promo}}</td>
                        <td>{{$promo->name_promo}}</td>
                        <td>{{$promo->discount}}</td>
                        <td>{{$promo->start_discount}}</td>
                        <td>{{$promo->end_discount}}</td>
                        <td>
                            <a href="/promo/{{$promo->id_promo}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/promo/{{$promo->id_promo}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody> 
        </table>

        <!-- Modal -->
        <div class="modal fade" id="addPromo" tabindex="-1" aria-labelledby="addPromoLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addPromoLabel">New Promo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <!-- Create new promo form -->
                <div class="modal-body">
                    <form action="/promo/create" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                          <label for="InputPromoID">Promo ID</label>
                          <input name="id_promo" type="char" class="form-control" id="InputPromoID" placeholder="Promo ID eg. P00001" required>
                        </div>
                        <div class="form-group">
                          <label for="InputPromoName">Promo Name</label>
                          <input name="name_promo" type="text" class="form-control" id="InputPromoName" placeholder="Promo Name" required>
                        </div>
                        <div class="form-group">
                            <label for="InputDiscount">Discount</label>
                            <input name="discount" type="number" step="any" class="form-control" id="InputDiscount" placeholder="Discount in decimal eg. 0.1 for 10%" required>
                        </div>
                        <div class="form-group">
                            <label for="InputStart">Promo Start</label>
                            <input name="start_discount" type="date" class="form-control" id="InputStart" placeholder="Promo Start" required>
                        </div>
                        <div class="form-group">
                            <label for="InputStart">Promo End</label>
                            <input name="end_discount" type="date" class="form-control" id="InputEnd" placeholder="Promo End" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection