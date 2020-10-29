@extends('layouts.master')

@section('Book', 'active')

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
            <h1>Book List</h1>
        </div>
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right mt-2" data-toggle="modal" data-target="#addBook">
            Add new book
            </button>
        </div>
    </div>

        <!-- Category data table -->
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID Book</th>
                    <th>ID Category</th>
                    {{-- <th>ID Promo</th> --}}
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    {{-- <th>Pages</th> --}}
                    {{-- <th>Date Published</th> --}}
                    <th>Publisher</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_book as $book)
                    <tr>
                        <td>{{$book->id_book}}</td>
                        <td>{{$book->fk_id_category}}</td>
                        {{--<td>{{$book->fk_id_promo}}</td> --}}
                        <td>{{$book->name_book}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->price_book}}</td>
                        {{-- <td>{{$book->pages}}</td>
                        <td>{{$book->date_published}}</td> --}}
                        <td>{{$book->publisher}}</td>
                        <td>{{$book->stock}}</td>
                        <td>
                            <a href="/book/{{$book->id_book}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/book/{{$book->id_book}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody> 
        </table>

        <!-- Modal -->
        <div class="modal fade" id="addBook" tabindex="-1" aria-labelledby="addBookLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addBookLabel">New Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <!-- Create new book form -->
                <div class="modal-body">
                    <form action="/book/create" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                          <label for="InputBookID">Book ID</label>
                          <input name="id_book" type="char" class="form-control" id="InputBookID" placeholder="Book ID eg. B00001" required>
                        </div>
                        <div class="form-group">
                          <label for="InputBookName">Book Title</label>
                          <input name="name_book" type="text" class="form-control" id="InputBookName" placeholder="Book Title" required>
                        </div>
                        <div class="form-group">
                            <label for="SelectCategory">Category</label>
                            <select class="form-control" id="SelectCategory" name="fk_id_category">
                                <option value="">-- Select One --</option>
                                @foreach($data_category as $category)
                                    <option value="{{$category->id_category}}">{{$category->name_category}}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="SelectPromo">Promo</label>
                            <select class="form-control" id="fk_id_promo">
                                <option value="">-- Select One --</option>
                                @foreach($data_promo as $promo)
                                    <option value="{{$promo->id_promo}}">{{$promo->name_promo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="InputAuthor">Author</label>
                            <input name="author" type="text" class="form-control" id="InputAuthor" placeholder="Author" required>
                        </div>
                        <div class="form-group">
                            <label for="InputPrice">Price</label>
                            <input name="price_book" type="number" class="form-control" id="InputPrice" placeholder="Price" required>
                        </div>
                        <div class="form-group">
                            <label for="InputPages">Pages</label>
                            <input name="pages" type="number" class="form-control" id="InputPages" placeholder="Number of pages" required>
                        </div>
                        <div class="form-group">
                            <label for="InputDatePublished">Date Published</label>
                            <input name="date_published" type="date" class="form-control" id="InputDatePublished" placeholder="Date Published" required>
                        </div>
                        <div class="form-group">
                            <label for="InputPublisher">Publisher</label>
                            <input name="publisher" type="text" class="form-control" id="InputPublisher" placeholder="Publisher" required>
                        </div>
                        <div class="form-group">
                            <label for="InputStock">Stock</label>
                            <input name="stock" type="number" class="form-control" id="InputStock" placeholder="Stock" required>
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