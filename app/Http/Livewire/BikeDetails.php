<?php

namespace App\Http\Livewire;

use App\Models\Bike;
use App\Models\Rent;
use Carbon\Carbon;
use Livewire\Component;

class BikeDetails extends Component
{
  
    public $bike,$rentcounts,$checkout="hide",$recommendedbikes,$from_date,$to_date,$rentaldays,$total_rental_price,$toogledialog="hide";
    public $dateerror,$image_url,$billbookdisplay='hidden';

    
    public function mount(){

        $bike=Bike::find($this->bike['id']);
        $this->image_url="storage/bike_images/".$bike['billbook'];

        $this->from_date=session()->get('from_date');
        $this->to_date=session()->get('to_date');
    }

    public function billbookdialog(){
          $this->billbookdisplay="fixed";
    }
   
    public function updated(){
      $this->calculaterentaldays();


    }

  



    public function calculaterentaldays(){
            $from_date=Carbon::parse($this->from_date);
            $to_date=Carbon::parse($this->to_date);

         $rentaldays=$from_date->diffInDays($to_date);

         $this->rentaldays=$rentaldays;


         $this->total_rental_price=$rentaldays*$this->bike->variant->variant_rental_price ;
         
    }




    public function checkout(){
        $this->checkout="show";
    
    }

    public function rentbike(){
        $rentbike=[
            "rent_from_date" => $this->from_date,
            "rent_to_date" => $this->to_date,
            "rental_status" => "Pending",
            "payment_method"=>"Credit",
            'total_rental_price'=>$this->total_rental_price,
             "bike_id" => $this->bike->id,
             "user_id"=>auth()->user()->id
        ];


       

        Rent::create($rentbike);
        $bike['status']="On Rent";
        Bike::find($this->bike->id)->update($bike);

        $msg='Bike Added on rent Successfully. Please come with rental ticket to take bike on rent';
        return redirect(route('renter.rent.details'))->with('success',$msg);
    }



    public function render()
    {
        return view('livewire.bike-details');
    }

    public function toogle(){

        if($this->from_date==""||$this->to_date==""){
            $this->dateerror="Please select the rental dates";
        }elseif($this->from_date>=$this->to_date){
            $this->dateerror="From date must be smaller than to date";
        }
        else{
             $this->dateerror="";
        }

       if($this->dateerror!=""){

    }else{
         if($this->toogledialog=="show"){
            $this->toogledialog="hide";
        }else{
             $this->toogledialog="show";
        }
    }
}
}
