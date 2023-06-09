<?php

namespace App\Http\Livewire;

use App\Models\Rent;
use Livewire\Component;
use Livewire\WithPagination;

class AdminRentDetails extends Component
{
    use WithPagination;
    public  $data="djhfd",$rentalstatus,$entries=10,$rentdialog='hide',$rent1;
    protected $rents;

public function switchtopaid($i_d){
    
    $rent['status']="Paid";
    Rent::find($i_d)->update($rent);
    
}

public function tooglerentdialog($id){

    if($this->rentdialog=="hide"){
        $this->rentdialog="show";

        $this->rent1=Rent::find($id);

       




    }else{
        $this->rentdialog="hide";
    }
}


public function showrentalrequest(){
    $this->data="clicked";
}

    public function render()
    {
          $rents=$this->rents=Rent::when($this->rentalstatus,function($q1){
            $q1->where('status','=',$this->rentalstatus);
          })->orderBy('id','desc')
          ->paginate($this->entries);

  
        return view('livewire.admin-rent-details',compact('rents'));
    }
}
