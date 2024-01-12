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
        Schema::create('RiceProductionByDistricts', function(Blueprint $table){
            $table->id();
            $table->string('CodeProvince');
            $table->string('ProvinceName');
            $table->integer('CodeDistricts');
            $table->string('DistrictsName');
            $table->integer('TonsIn2020');
            $table->integer('TonsIn2021');
            $table->integer('TonsIn2022');
            $table->integer('TonsIn2023');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('RiceProductionByDistricts');
    }
};
