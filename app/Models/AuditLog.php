<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    // The attributes that should be cast to native types
    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
    ];

    public function rentalStatusLog($id)
    {
        $logs= $this->where('table_name', 'rents')->where('record_id', $id)->select('old_values', 'new_values')->get();

        return $logs;
    }
}
