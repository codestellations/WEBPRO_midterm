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
            <h1>Category Data</h1>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addCategory">
            Add new category
            </button>
        </div>

        <!-- Category data table -->
        <table class="table table-hover">
            <tr>
                <th>ID Category</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
            @foreach($data_category as $category)
            <tr>
                <td>{{$category->id_category}}</td>
                <td>{{$category->name_category}}</td>
                <td>
                    <a href="/category/{{$category->id_category}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/category/{{$category->id_category}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryLabel">New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- create new category form -->
                <div class="modal-body">
                    <form action="/category/create" method="post">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="inputCategoryID">Category ID</label>
                            <input name="id_category" type="number" class="form-control" id="inputCategoryID1" min="100000" max="999999" required>
                        </div> 
                        <div class="form-group">
                            <label for="inputCategoryName">Category Name</label>
                            <input name="name_category" type="text" class="form-control" id="inputCategoryName1" required>
                        </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection