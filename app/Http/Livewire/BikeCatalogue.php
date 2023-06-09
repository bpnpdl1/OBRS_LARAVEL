<?php

namespace App\Http\Livewire;

use App\Models\Bike;
use App\Models\Brand;
use App\Models\Variant;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;

class BikeCatalogue extends Component
{
   use WithPagination;
    public $brands,$priceorder,$ccs,$ccvalue,$min_cc,$max_cc,$brandInputs=[];


     
    public function mount(){
       $this->min_cc=Bike::min('cc');
        $this->max_cc=Bike::max('cc');
      
        

    }

   

   
    public function render()
    {
     $bikes = Bike::when($this->brandInputs, function ($q) {
            $q->whereIn('brands.brand_name', $this->brandInputs);
        })
        ->when($this->ccvalue, function ($q) {
            $q->where('cc', '<=', $this->ccvalue);
        })
        ->select('variants.*', 'bikes.*', 'bikes.id AS bike_id', 'brands.brand_name AS brand_name')
        ->join('variants', 'variants.id', '=', 'bikes.variant_id')
        ->leftJoin('brands', 'brands.id', '=', 'variants.id')
        ->where('bikes.status', '=', 'Available')
        ->when($this->priceorder,function($q1){
            $q1->orderBy('variant_rental_price', $this->priceorder);
        })->paginate(10);

 

        return view('livewire.bike-catalogue',compact('bikes'));
    }

    public function rentbike($id){
          
        
      
        $bike=Bike::find($id);
        

       
        
        return redirect(route('renter.bikedetails'))->with(compact('bike'));
       
    
    }

    
}
