<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\VariantsChart;
use Carbon\Carbon;

class AnalyticsCharts extends Component
{
    public $month, $sn = 0, $maina;


    public function mount()
    {
        $this->month = date('Y-m');
    }



    public function updated()
    {
        session()->put('month', $this->month);
    }



    public function render()
    {


        return view('livewire.analytics-charts');
    }
}
