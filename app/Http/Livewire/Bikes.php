<?php

namespace App\Http\Livewire;

use App\Models\Bike;
use Livewire\Component;


class Bikes extends Component
{
    
    public $bikes,$sn=1,$image_url;
    public $billbookdialog="hide";


    public function mount(){
        $this->bikes = Bike::all();
      
    }
   

     public function billbookdialog($id){

      
       
        if($this->billbookdialog=="hide"){
       
             $this->billbookdialog="show";
             $bike=Bike::find($id);
              $this->image_url='storage/bike_images/'.$bike['billbook'];

        }else{

        $this->billbookdialog="hide";

        }

        

     }


    public function render()
    {
         
        
        return view('livewire.bikes');
    }
}
