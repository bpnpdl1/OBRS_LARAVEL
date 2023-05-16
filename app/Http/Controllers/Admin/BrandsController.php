<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brands = Brands::all();
        $brands = $brands->toArray();
        return view('admin.brands.index')->with(compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'brand_logo' => 'required|image|max:512',
            'brand_name' => 'required|min:5'

        ]);

        $path = Storage::disk('public')->put('logo', $request->file('brand_logo'));

        $data = [
            'brand_name' => $request->brand_name,
            'brand_logo' => $path
        ];
        Brands::create($data);
        $brands = Brands::all();
        $brands = $brands->toArray();
        $success="Successfully Created New Brand";
        // return view('admin.brands.index')->with(compact('brands','success'));
        return redirect(route('brands.index'))->with('success',$success);
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
        $brand = Brands::find($id);

        return view('admin.brands.edit')->with(compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, Request $request)
    {
        //
        
        $request->validate([
            'brand_name'=>'required',
            'brand_logo' => 'sometimes|max:512|image'

        ]);
        $data = [
            'brand_name' => $request->brand_name
        ];
        Brands::find($id)->update($data);


        if (!is_null($request->file('brand_logo'))) {
            $brand=Brands::find($id);
            Storage::disk('public')->delete($brand['brand_logo']);  
            $path = Storage::disk('public')->put('logo', $request->file('brand_logo'));
            Brands::find($id)->update(['brand_logo'=>$path]);

        }


        return redirect(route('brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brands $brand)
    {
        //
        dd($brand);
    }
}
