<?php

namespace App\Http\Livewire;

use App\Models\Bike;
use App\Models\Rent;
use Livewire\Component;
use Livewire\WithPagination;

class RentDetails extends Component
{
    use WithPagination;
 public $tickettoogle="hide",$i_id,$rentalbike;
 public $bikesinputs=[];
   

      public function tickettoogle($id){
        
        if($this->tickettoogle=="show"){
         $this->tickettoogle="hide";
         
        }elseif ($this->tickettoogle=="hide") {
            $this->tickettoogle="show";
            $this->i_id=$id;
            $this->rentalbike=Rent::find($id);

        }
        
      
       

    }

        public function exportpdf(){
            
        dd($this->rentalbike);

        }

    public function render()
    {

        $rawrent=Rent::where('user_id','=',auth()->user()->id);
        $rents=Rent::when($this->bikesinputs,function($q){
            $q->whereIn('bike_id',$this->bikesinputs);
        })->where('user_id','=',auth()->user()->id)->orderBy('status','asc')->paginate(10);
       
        $bikesdata=$rawrent->groupBy('rents.bike_id')->pluck('rents.bike_id');
         
        $bikes=Bike::whereIn('id',$bikesdata)->get();
       
        return view('livewire.rent-details',compact('rents','bikes'));
    }
}
