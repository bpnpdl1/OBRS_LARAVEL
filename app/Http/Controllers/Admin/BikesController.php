<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bikes;
use App\Models\Variants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BikesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bikes = Variants::join('bikes', 'variants.id', '=', 'bikes.variant_id')->join('brands','brands.id','=','variants.brand_id')->get();
       
        return view('admin.bikes.index')->with(compact('bikes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $variants=Variants::all();
        return view('admin.bikes.create')->with(compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    

        $path=Storage::disk('public')->put('bike_images',$request->file('image'));
        $path=str_replace('bike_images/','',$path);
 
        $data=[
            'number_plate'=>$request['number_plate'],
            'cc'=>$request['cc'],
            'variant_id'=>$request['variant'],
            'status'=>$request['status'],
            'model_year'=>$request['model_year'],
            'billbook'=>$path
        ];
      
        Bikes::create($data);
        $success="New Bike Added Successfully";
        return redirect(route('bikes.index'))->with('success',$success);
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
        $variants=Variants::all();
        $bikes = Variants::join('bikes', 'variants.id', '=', 'bikes.variant_id')->join('brands','brands.id','=','variants.brand_id')->get();
       
        return view('admin.bikes.edit')->with(compact('variants','bikes'));

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
