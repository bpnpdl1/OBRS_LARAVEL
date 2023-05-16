<?php

namespace App\Http\Controllers;

use App\Models\Bikes;
use App\Models\Brands;
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
        $brands=Brands::count();
        $variants=Variants::count();
        $bikes=Bikes::count();
        $counts=compact('brands','variants','bikes');
        
        return view('admin.dashboard')->with($counts);
    }
}
