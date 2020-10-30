@extends('layouts.master')

@section('Dashboard', 'active')

@section('content')
    <h1>Update Profile</h1>
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
    
    <!-- update data category form -->
    <div class="row">
        <div class="col-lg-12">
            <form action="/dashboard/{{auth()->user()->id}}/update" method="post">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="inputCategoryName">Name</label>
                    <input name="user_name" type="text" class="form-control" id="inputCategoryName1" value="{{auth()->user()->name}}" required>
                </div> 
                <div class="form-group">
                    <label for="InputAuthor">Email</label>
                    <input name="user_email" type="text" class="form-control" id="InputAuthor" placeholder="Author" value="{{auth()->user()->email}}" required>
                </div>
                <div class="form-group">
                    <label for="InputPrice">Phone Number</label>
                    <input name="user_phone_num" type="number" class="form-control" id="InputPrice" placeholder="Price" value="{{auth()->user()->phone_num}}" required>
                </div>
                <button type="button" class="btn btn-secondary" onclick="document.location.href='/dashboard';">Cancel</button>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
@endsection