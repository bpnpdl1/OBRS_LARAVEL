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
}
