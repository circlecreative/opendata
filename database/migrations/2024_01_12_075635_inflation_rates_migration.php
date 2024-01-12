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
        //
        Schema::create('InflationRates', function(Blueprint $table){
            $table->id();
            $table->string('City');
            $table->string('2017PercentAmount');
            $table->string('2018PercentAmount');
            $table->string('2019PercentAmount');
            $table->string('2020PercentAmount');
            $table->string('2021PercentAmount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('InflationRates');
    }
};
