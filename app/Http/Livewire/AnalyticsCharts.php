<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AnalyticsCharts extends Component
{
    public $month, $sn = 0;





    public function changemonth($month)
    {
        $this->month = $month;
    }

    public function updated()
    {
    }



    public function render()
    {

        return view('livewire.analytics-charts');
    }
}
