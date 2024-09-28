<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    //

    public function getLocation(Request $request)
    {
      
       $data= [
        'name' => auth()->user()->name,
       ];

    //    $user_id=auth()->id;

       



       return response()->json($data);
    }
}
