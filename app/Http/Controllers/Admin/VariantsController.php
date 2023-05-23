<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Variants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VariantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $variants = Variants::join('brands','brands.id','=','variants.brand_id')->get();
        
        $variant=Variants::all();
        foreach($variant as $v)
        {
            $v->brand = $v->brands();
        }
        dd($variant->all());

        return view('admin.variants.index')->with(compact('variants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $brands = Brands::all();
        return view('admin.variants.create')->with(compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'variant_name' => 'required'
        ]);
       
        $path = Storage::disk('public')->put('variant_images', $request->file('variant_image'));
        $path = str_replace('variant_images/', "", $path);

        $data = [
            'variant_name' => $request['variant_name'],
            'variant_rental_price' => $request['variant_rental_price'],
            'brand_id' => $request['brand'],
            'variant_image' => $path
        ];

        Variants::create($data);


        $variants = Variants::all();
        $success = "Created new variant successfully";

        return redirect(route('variants.index'))->with('success', $success);
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


        $variant = Variants::find($id);
        $brands = Brands::all();
        return view('admin.variants.edit')->with(compact('id', 'variant', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $data=[
            'variant_name'=>$request['variant_name'],
            'variant_rental_price'=>$request['variant_rental_price'],
            'brand_id'=>$request['brand']

        ];

    
      
        Variants::find($id)->update($data);

        $variant = Variants::find($id);

        if (!is_null($request->file('variant_image')) && !is_null($variant['variant_image'])) {

            Storage::disk('public')->delete('variant_images/'.$variant['variant_image']);

            $path = Storage::disk('public')->put('variant_images', $request->file('variant_image'));
            $path = str_replace('variant_images/', '', $path);
            Variants::find($id)->update(['variant_image' => $path]);
        }

     


        $success = "Updated Variant successfully";

        return redirect(route('variants.index'))->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        dd($id);
    }
}
