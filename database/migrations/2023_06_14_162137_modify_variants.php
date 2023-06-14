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
        Schema::table('variants', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('brand_id')->change();
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('variants', function (Blueprint $table) {
            //
            $table->dropForeign(['brand_id']);
            $table->integer('brand_id')->change();
        });
    }
};
