<?php

namespace App\Http\Livewire\Admin;

use App\Models\AuditLog;
use DateTime;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class RentChart extends Component
{

    public $chartData = [];

    public $colors = [];

    public $ganttChart="close";


    public $ganttData = [];


    public $recordId;


    public function mount($recordId)
    {
        $this->recordId = $recordId;
        $this->fetchGanttData();
    }

    public function fetchGanttData()
    {
        // Fetch the audit logs for a specific record ID
        $rents = AuditLog::where('table_name', 'rents')
                         ->where('record_id', $this->recordId)
                         ->get();

        // Transform the data for Gantt Chart
        $this->ganttData = $rents->map(function ($rent) {
            return [
                $rent->action, // Task ID (action, e.g., "created", "updated")
                'Rent Event', // Task Name or Description
                $rent->new_values['rent_from_date'] ?? now(), // Start Date
                $rent->new_values['rent_to_date'] ?? now(),   // End Date
                null,    // Duration (optional)
                100,     // Percent Complete (example value, you can adjust as needed)
                null     // Dependencies (optional)
            ];
        })->toArray();

        // Emit the data to the frontend to update the chart
        $this->dispatchBrowserEvent('show-gantt-chart', ['ganttData' => $this->ganttData]);
    }


  
    
    function transformToGanttFormat($records) {
        return array_map(function($record) {
            $newValues = $record['new_values'];
    
            $status = $newValues['rental_status'] ?? 'Unknown'; // Default if not set
            $description = $newValues['rental_status']; // Static description
            $startDate = isset($newValues['rent_from_date']) ? new DateTime($newValues['rent_from_date']) : new DateTime();
            $endDate = isset($newValues['rent_to_date']) ? new DateTime($newValues['rent_to_date']) : new DateTime();
            $completion = 100; // Static value or dynamic if available
    
            return [
                $status,
                $description,
                $startDate->format('Y, m, d'), // Format Date for JavaScript
                $endDate->format('Y, m, d'),
                null,
                $completion,
                null
            ];
        }, $records);
    }

    
    
    // Helper function to return colors based on status

    public function getColorByStatus($status)
    {
        switch ($status) {
            case 'Pending':
                return '#FFC107';
            case 'Approved':
                return '#28A745';
            case 'Rejected':
                return '#DC3545';
            default:
                return '#6C757D';
        }
    }
 
    

    public function render()
    {
        return view('livewire.admin.rent-chart');
    }
}
