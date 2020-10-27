@extends('layouts.master')

@section('content')
    <h1>Update Data Category</h1>
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
            <form action="/category/{{$category->id_category}}/update" method="post">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="inputCategoryName">Category Name</label>
                    <input name="name_category" type="text" class="form-control" id="inputCategoryName1" value="{{$category->name_category}}" required>
                </div> 
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
@endsection