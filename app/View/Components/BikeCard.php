<?php

namespace App\View\Components;

use App\Models\Bike;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BikeCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $bike;
    public function __construct()
    {
        //
        $this->bike = Bike::find(1);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bike-card');
    }
}
