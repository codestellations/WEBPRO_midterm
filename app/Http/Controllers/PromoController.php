<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_promo = \App\Models\Promo::all();
        return view('promo.index', ['data_promo' => $data_promo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //check if promo exist
        $checker = \App\Models\Promo::select('id_promo')->where('id_promo',$request->id_promo)->exists();
        if($checker){
            return redirect('/promo')->with('fail', 'Data already exists'); //redirect to promo route   
        }

        $query = \App\Models\Promo::create($request->all()); // insert data to database 
        return redirect('/promo')->with('success', 'Input data success'); //redirect to category route if success
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_promo)
    {
        $promo = \App\Models\Promo::find($id_promo); // find the id and save it to variable promo
        return view('promo/edit', ['promo' => $promo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_promo)
    {
        $promo = \App\Models\Promo::find($id_promo); // find the id and save it to variable promo
        $promo->update($request->all()); // update data to database
        return redirect('/promo')->with('success', 'Update data success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id_promo)
    {
        $promo = \App\Models\Promo::find($id_promo); // find the id and save it to variable promo
        $promo->delete($promo);
        return redirect('/promo')->with('success', 'Delete data success');
    }
}
