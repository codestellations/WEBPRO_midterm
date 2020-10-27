<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // function to read category
    public function index(){
        $data_category = \App\Models\Category::all();
        return view('category.index', ['data_category' => $data_category]);
    }

    // function to create category
    public function create(Request $request){
        //check if category exist
        $checker = \App\Models\Category::select('id_category')->where('id_category',$request->id_category)->exists();
        if($checker){
            return redirect('/category')->with('fail', 'Data already exists'); //redirect to category route   
        }

        $query = \App\Models\Category::create($request->all()); // insert data to database 
        return redirect('/category')->with('success', 'Input data success'); //redirect to category route if success
    }

    // function to edit category
    public function edit($id_category){
        $category = \App\Models\Category::find($id_category); // find the id and save it to variable category
        return view('category/edit', ['category' => $category]);
    }

    // function to update category
    public function update(Request $request, $id_category){
        $category = \App\Models\Category::find($id_category); // find the id and save it to variable category
        $category->update($request->all()); // update data to database
        return redirect('/category')->with('success', 'Update data success');
    }

    // function to delete category
    public function delete($id_category){
        $category = \App\Models\Category::find($id_category); // find the id and save it to variable category
        $category->delete();
        return redirect('/category')->with('success', 'Delete data success');
    }
}
