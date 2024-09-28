<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('user_id')->nullable(); // The user who made the change
        $table->string('action'); // e.g., 'created', 'updated', 'deleted'
        $table->string('table_name'); // The name of the table (e.g., 'users', 'bikes')
        $table->unsignedBigInteger('record_id'); // The ID of the record that was modified
        $table->json('old_values')->nullable(); // Stores the old values
        $table->json('new_values')->nullable(); // Stores the new values
        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
