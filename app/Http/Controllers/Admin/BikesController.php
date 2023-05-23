<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bikes;
use App\Models\Brands;
use App\Models\Variants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BikesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $bikes = Bikes::join('variants','bikes.variants_id','=','variants.id')
        ->select('bikes.*','variants.variant_name','variants.brand_id')
        ->get();
       
       $brands=Brands::all() ;
       
        return view('admin.bikes.index')->with(compact('bikes','brands'));
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
    $request->validate([
          'number_plate'=>'required',
          'cc'=>'required',
          'status'=>'required',
          'variant'=>'required',
    ]);

        $path=Storage::disk('public')->put('bike_images',$request->file('image'));
        $path=str_replace('bike_images/','',$path);
 
        $data=[
            'number_plate'=>$request['number_plate'],
            'cc'=>$request['cc'],
            'variants_id'=>$request['variant'],
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
        $bike=Bikes::find($id);
        // $bikes = Variants::join('bike', 'variants.id', '=', 'bikes.variants_id')->join('brands','brands.id','=','variants.brand_id')->get();
       
        return view('admin.bikes.edit')->with(compact('variants','bike'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $request->validate([
          'number_plate'=>'required',
          'cc'=>'required',
          'status'=>'required',
          'variant'=>'required',
          'billbook'=>'nullable|image'
    ]);



    $bike=Bikes::find($id);
   
      
        $data=[
            'number_plate'=>$request['number_plate'],
            'cc'=>$request['cc'],
            'variants_id'=>$request['variant'],
            'status'=>$request['status'],
            'model_year'=>$request['model_year']
        ];

         

        $file=(array)$request->file('billbook');

           if(!empty($file)){

           
            $path=Storage::disk('public')->put('bike_images',$request->file('billbook'));
            Storage::disk('public')->delete('bike_images/'.$bike['billbook']);
            $path=str_replace('bike_images/','',$path);
            
            $data=['billbook'=>$path];

          
 
                 }
           Bikes::find($id)->update($data);
     
        return redirect(route('bikes.index'))->with('success','Bike Details Updated Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
       $bike_id=$request->bike_id;   
       $bike=Bikes::find($bike_id);
       $bike->delete();
      
       return redirect(route('bikes.index'))->with('success','Bike Detail Deleted Successfully');
    }
}
