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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->date('rent_from_date');
            $table->date('rent_to_date');
            $table->enum('rental_status',['Pending','Approved','Marked_as_return','Reject']);   
            $table->string('rental_number')->default('123');
            $table->foreignId('bike_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('total_rental_price');
             $table->enum('payment_method',['Online','Cash','Credit'])->default('Credit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
