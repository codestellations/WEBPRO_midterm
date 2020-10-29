@extends('layouts.master')

@section('Book', 'active')

@section('content')
    <h1>Update Data Book</h1>
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
            <form action="/book/{{$book->id_book}}/update" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="InputBookName">Book Title</label>
                    <input name="name_book" type="text" class="form-control" id="InputBookName" placeholder="Book Title" value="{{$book->name_book}}" required>
                </div>
                <div class="form-group">
                    <label for="SelectCategory">Category</label>
                    <select class="form-control" id="SelectCategory" name="fk_id_category">
                        <option value="{{$book->fk_id_category}}">-- Select One --</option>
                        @foreach($data_category as $category)
                            <option value="{{$category->id_category}}">{{$category->name_category}}</option>
                        @endforeach
                    </select>
                    </div>
                <div class="form-group">
                    <label for="SelectPromo">Promo</label>
                    <select class="form-control" id="fk_id_promo">
                        <option value="{{$book->fk_id_promo}}">-- Select One --</option>
                        @foreach($data_promo as $promo)
                            <option value="{{$promo->id_promo}}">{{$promo->name_promo}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="InputAuthor">Author</label>
                    <input name="author" type="text" class="form-control" id="InputAuthor" placeholder="Author" value="{{$book->author}}" required>
                </div>
                <div class="form-group">
                    <label for="InputPrice">Price</label>
                    <input name="price_book" type="number" class="form-control" id="InputPrice" placeholder="Price" value="{{$book->price_book}}" required>
                </div>
                <div class="form-group">
                    <label for="InputPages">Pages</label>
                    <input name="pages" type="number" class="form-control" id="InputPages" placeholder="Number of pages" value="{{$book->pages}}" required>
                </div>
                <div class="form-group">
                    <label for="InputDatePublished">Date Published</label>
                    <input name="date_published" type="date" class="form-control" id="InputDatePublished" placeholder="Date Published" value="{{$book->date_published}}" required>
                </div>
                <div class="form-group">
                    <label for="InputPublisher">Publisher</label>
                    <input name="publisher" type="text" class="form-control" id="InputPublisher" placeholder="Publisher" value="{{$book->publisher}}" required>
                </div>
                <div class="form-group">
                    <label for="InputStock">Stock</label>
                    <input name="stock" type="number" class="form-control" id="InputStock" placeholder="Stock" value="{{$book->stock}}" required>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
@endsection