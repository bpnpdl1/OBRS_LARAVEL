<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bikes;
use App\Models\Brands;
use App\Models\Rents;
use App\Models\User;
use App\Models\Variants;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rents=Rents::join('bikes','bikes.id','=','rents.bike_id')
        ->join('users','users.id','=','rents.user_id')
        ->select('rents.*','users.name','bikes.number_plate')
        ->get();
      
        return view('admin.rents.index')->with(compact('rents'));
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
        
        $data=Bikes::all()->where('variants_id','=',$request->variant_id);
      $bikes=$data->toArray();
      

      return response()->json($bikes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //total_rental_price
        //

        $variants=Variants::find($request->variant);

        $from_date=Carbon::createFromDate($request->from_date);
         $to_date=Carbon::createFromDate($request->to_date);

        $rental_days=$to_date->diffInDays($from_date);
        $total_rental_price=$variants['variant_rental_price']*$rental_days;
       


        $user=User::all()->where('email','=',$request->email)[0];
        
        $data=[
            "rent_from_date" => $request->from_date,
            "rent_to_date" => $request->to_date,
            "status" => "Available",
            'total_rental_price'=>$total_rental_price,
             "bike_id" => $request->bike,
             "user_id"=>$user->id
        ];

        Rents::create($data);
        return redirect(route('rents.index'))->with('success','Bike Added on rent Successfully');

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
