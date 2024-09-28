<?php

namespace App\Observers;

use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;

class AuditLogObserver
{
    public function created($model)
    {
        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => 'created',
            'table_name' => $model->getTable(),
            'record_id' => $model->id,
            'new_values' => $model->toArray(),
        ]);
    }

    public function updated($model)
    {
     // List of fields you want to ignore in the audit log
    $ignoreFields = ['password', 'remember_token', 'updated_at'];

    // Get the original values of the model before it was updated
    $oldValues = array_diff_key($model->getOriginal(), array_flip($ignoreFields));

    // Get the changed values after the update
    $newValues = array_diff_key($model->getChanges(), array_flip($ignoreFields));

    // Create the audit log entry, excluding the ignored fields
    AuditLog::create([
        'user_id' => Auth::id(),  // The user who made the change
        'action' => 'updated',    // The action type
        'table_name' => $model->getTable(),  // Table name (e.g., 'users')
        'record_id' => $model->id,  // ID of the record being modified
        'old_values' => $oldValues,  // Old values excluding ignored fields
        'new_values' => $newValues,  // New values excluding ignored fields
    ]);
    }

    public function deleted($model)
    {
        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => 'deleted',
            'table_name' => $model->getTable(),
            'record_id' => $model->id,
            'old_values' => $model->toArray(),
        ]);
    }
}

?>