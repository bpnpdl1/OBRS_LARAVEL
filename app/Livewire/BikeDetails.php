<?php

namespace App\Livewire;

use App\Models\Bike;
use Carbon\Carbon;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class BikeCatalogue extends Component
{
    use WithPagination;

    public $brands;
    public $priceorder;
    public $ccvalue;
    public $min_cc;
    public $max_cc;

    #[Url('brandInputs.*')]
    public $brandInputs = [];

    public $from_date;
    public $to_date;

    public function mount()
    {
        $this->min_cc = Bike::min('cc');
        $this->max_cc = Bike::max('cc');

        $from_date = Carbon::parse(session()->get('from_date'));
        $to_date = Carbon::parse(session()->get('to_date'));

        $this->from_date = $from_date->format('M-d');
        $this->to_date = $to_date->format('M-d');
    }

    public function render()
    {
        // Fetching bikes from the database
        $bikes = Bike::select('variants.*', 'bikes.*', 'bikes.id AS bike_id', 'brands.brand_name AS brand_name')
            ->join('variants', 'variants.id', '=', 'bikes.variant_id')
            ->leftJoin('brands', 'brands.id', '=', 'variants.id')
            ->where('bikes.status', '=', 'Available')
            ->when($this->brandInputs, function ($query) {
                $query->whereIn('brands.brand_name', $this->brandInputs);
            })
            ->get();

        // Apply filtering by CC using binary search algorithm
        if ($this->ccvalue) {
            $bikes = $this->filterBikesByCC($bikes, $this->ccvalue);
        }

        // Apply sorting by price using QuickSort algorithm
        if ($this->priceorder) {
            $bikes = $this->sortBikesByPrice($bikes, $this->priceorder);
        }

        // Manually paginate the collection
        $bikes = $this->paginate($bikes, 10);

        return view('livewire.bike-catalogue', compact('bikes'));
    }

    /**
     * QuickSort algorithm for sorting bikes by price.
     */
    private function sortBikesByPrice($bikes, $order)
    {
        $bikesArray = $bikes->toArray();
        $this->quickSort($bikesArray, 0, count($bikesArray) - 1);

        if ($order === 'desc') {
            $bikesArray = array_reverse($bikesArray);
        }

        return collect($bikesArray);
    }

    private function quickSort(&$bikes, $low, $high)
    {
        if ($low < $high) {
            $pi = $this->partition($bikes, $low, $high);

            $this->quickSort($bikes, $low, $pi - 1);
            $this->quickSort($bikes, $pi + 1, $high);
        }
    }

    private function partition(&$bikes, $low, $high)
    {
        $pivot = $bikes[$high]['variant_rental_price'];
        $i = ($low - 1);

        for ($j = $low; $j < $high; $j++) {
            if ($bikes[$j]['variant_rental_price'] <= $pivot) {
                $i++;
                $temp = $bikes[$i];
                $bikes[$i] = $bikes[$j];
                $bikes[$j] = $temp;
            }
        }

        $temp = $bikes[$i + 1];
        $bikes[$i + 1] = $bikes[$high];
        $bikes[$high] = $temp;

        return $i + 1;
    }

    /**
     * Binary search algorithm for filtering bikes by CC value.
     */
    private function filterBikesByCC($bikes, $ccValue)
    {
        $bikesArray = $bikes->toArray();
        $filtered = [];

        // Use binary search to find bikes with CC <= $ccValue
        $low = 0;
        $high = count($bikesArray) - 1;

        while ($low <= $high) {
            $mid = floor(($low + $high) / 2);

            if ($bikesArray[$mid]['cc'] <= $ccValue) {
                $filtered[] = $bikesArray[$mid];
                $low = $mid + 1; // Move to the right half
            } else {
                $high = $mid - 1; // Move to the left half
            }
        }

        return collect($filtered);
    }

    /**
     * Manually paginate a collection.
     */
    private function paginate($items, $perPage)
    {
        $page = request()->get('page', 1);
        $total = $items->count();
        $results = $items->forPage($page, $perPage)->values();

        return new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => request()->url(),
            'query' => request()->query(),
        ]);
    }

    public function rentbike($id)
    {
        $bike = Bike::find($id);
        return redirect(route('renter.bikedetails'))->with(compact('bike'));
    }
}
