<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_category = \App\Models\Category::all();
        $data_promo = \App\Models\Promo::all();
        $data_book = \App\Models\Book::all();
        return view('book.index', ['data_book' => $data_book, 'data_category' => $data_category, 'data_promo' => $data_promo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //check if book exist
        $checker = \App\Models\Book::select('id_book')->where('id_book',$request->id_book)->exists();
        if($checker){
            return redirect('/book')->with('fail', 'Data already exists'); //redirect to book route   
        }

        $query = \App\Models\Book::create($request->all()); // insert data to database 
        return redirect('/book')->with('success', 'Input data success'); //redirect to category route if success
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_book)
    {
        $data_category = \App\Models\Category::all();
        $data_promo = \App\Models\Promo::all();
        $book = \App\Models\Book::find($id_book); // find the id and save it to variable promo
        return view('book/edit', ['book' => $book, 'data_category' => $data_category, 'data_promo' => $data_promo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_book)
    {
        $book = \App\Models\Book::find($id_book); // find the id and save it to variable book
        $book->update($request->all()); // update data to database
        return redirect('/book')->with('success', 'Update data success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id_book)
    {
        $book = \App\Models\Book::find($id_book); // find the id and save it to variable book
        $book->delete($book);
        return redirect('/book')->with('success', 'Delete data success');
    }
}
