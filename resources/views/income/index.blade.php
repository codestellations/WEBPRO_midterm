@extends('layouts.master')

@section('Income', 'active')

@section('content')
    <div class="card text-center mr-auto ml-auto mt-5" style="width: 18rem;" >
        <div class="card-header">
            Income
        </div>
        <div class="card-body">
            <h5 class="card-title">Da Venti's Income</h5>
            <p class="card-text">Rp{{$data_payment}}</p>
        </div>
    </div>
@endsection