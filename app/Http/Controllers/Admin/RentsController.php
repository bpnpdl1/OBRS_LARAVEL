<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bikes;
use App\Models\Brands;
use App\Models\Variants;
use Illuminate\Http\Request;

class RentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.rents.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $brands=Brands::all();
        return view('admin.rents.create',compact('brands'));
    }

    public function getVariant(Request $request){
        
        $data=Variants::all()->where('brand_id','=',$request->brand_id);
         $variants=$data->toArray();
      
     
      return response()->json($variants);
    }
    public function getBike(Request $request){
        
        $data=Bikes::all()->where('variant_id','=',$request->variant_id);
      $bikes=$data->toArray();
      

      return response()->json($bikes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
