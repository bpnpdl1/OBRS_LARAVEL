<?php

namespace App\Livewire;

use App\Models\AuditLog;
use App\Models\Bike;
use App\Models\Rent;
use Livewire\Component;
use Livewire\WithPagination;

class AdminRentDetails extends Component
{
    use WithPagination;

    public $data = 'djhfd';

    public $paymentmethod;

    public $entries = 10;

    public $rentdialog = 'hide';

    public $ganntdialog = 'hide';

    public $rent1;

    public $rentalpayments = ['status' => '', 'payment_method' => '', 'refund'];

    public $refundclass = 'hidden';

    public $rentalstatus = [];

    public $isLoading = false;

    public $display = 'block';

    protected $rents;

    public function toogleganntdialog($id)
    {
        if ($this->ganntdialog == 'hide') {
            $this->ganntdialog = 'show';
    
            // Fetch the rent log data and sort by created_at to keep the timeline
            $rentLog = AuditLog::where('table_name', 'rents')
                ->where('record_id', $id)
                ->select('old_values', 'new_values', 'created_at', 'updated_at')
                ->orderBy('created_at', 'asc')
                ->get();
    
            // Initialize an empty array to store task data
            $tasks = [];
            $statuses = []; // Track the statuses and their timelines
    
            // Loop through the rent log and extract new and old values
            foreach ($rentLog as $index => $item) {
                // Check if new_values and old_values are JSON strings and decode if necessary
                $new_values = is_string($item->new_values) ? json_decode($item->new_values, true) : $item->new_values;
                $old_values = is_string($item->old_values) ? json_decode($item->old_values, true) : $item->old_values;
    
               
                // For new status: take the created_at as start, and the next log's created_at as end (or updated_at if it's the last)
                if (isset($new_values['rental_status'])) {
                    // Determine the end date: if it's the last entry, use updated_at, otherwise use the created_at of the next log entry
                    $end_date = isset($rentLog[$index + 1]) ? $rentLog[$index + 1]->created_at : $item->updated_at;
    
                    $statuses[] = [
                        'id' => $new_values['id'] ?? null,
                        'name' => 'Bike '  . ' - ' . ($new_values['rental_status'] ?? 'Unknown'),
                        'start' => $item->created_at->format('Y-m-d'), // created_at as start date
                        'end' => $end_date->format('Y-m-d'), // the next status change or updated_at as the end date
                        'payment_method' => $new_values['payment_method'] ?? 'Unknown',
                    ];
                }
    
                // For old status: same as above
                if (isset($old_values['rental_status'])) {
                    $end_date = isset($rentLog[$index + 1]) ? $rentLog[$index + 1]->created_at : $item->updated_at;
    
                    $statuses[] = [
                        'id' => $old_values['id'] ?? null,
                        'name' => 'Bike '  . ' - ' . ($old_values['rental_status'] ?? 'Unknown'),
                        'start' => $item->created_at->format('Y-m-d'), // created_at as start date
                        'end' => $end_date->format('Y-m-d'), // the next status change or updated_at as the end date
                        'payment_method' => $old_values['payment_method'] ?? 'Unknown',
                    ];
                }
            }
    
            // Now the $statuses array is ready to be passed to the Gantt chart.
            // You can pass it to the frontend or process it as needed.
            // For now, let's print it out to see what the tasks array looks like:
         
    
            // Dispatch the event to show the Gantt chart
            $this->dispatch('show-gannt-chart', ['tasks' => $statuses]);
    
        } else {
            $this->ganntdialog = 'hide';
        }
    }
    
    
    

    
    

    public function tooglerentdialog($id)
    {

        if ($this->rentdialog == 'hide') {
            $this->rentdialog = 'show';

            $this->rent1 = Rent::find($id);
            $this->rentalpayments = $this->rent1->toArray();
        } else {
            $this->rentdialog = 'hide';
        }
    }

    public function saverentaltransaction()
    {
        $this->isLoading = true;

        $data = [
            'rental_status' => $this->rentalpayments['rental_status'],
            'payment_method' => $this->rentalpayments['payment_method'],
        ];

        if ($data['rental_status'] == 'Marked_as_return') {
            $bike = Bike::find($this->rent1['bike_id']);
            $bike->status = 'Available';
            $bike->save();
        }

        Rent::find($this->rentalpayments['id'])->update($data);

        session()->flash('success', 'Rental and Payment Status Changed Successfully');
        // $this->tooglerentdialog($this->rentalpayments['id']);

        $this->isLoading = false;

        return redirect(route('rents.index'));
    }

    public function showrentalrequest()
    {
        $this->data = 'clicked';
    }

    public function render()
    {
        $rents = $this->rents = Rent::when($this->paymentmethod, function ($q1) {
            $q1->where('payment_method', '=', $this->paymentmethod);
        })->when($this->rentalstatus, function ($q1) {
            $q1->where('rental_status', '=', $this->rentalstatus);
        })->orderBy('id', 'desc')
            ->paginate($this->entries);

        return view('livewire.admin-rent-details', compact('rents'));
    }
}
