<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Bikes;
use App\Models\Brand;
use App\Models\Variant;
use App\Models\Variants;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        //
        $brands=Brand::count(); 
        $variants=Variant::count();
        $bikes=Bike::count();
        $counts=compact('brands','variants','bikes');
        
        return view('admin.dashboard')->with($counts);
    }
}
