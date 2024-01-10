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
        Schema::create('ConsumsionTaxs', function (Blueprint $table) {
            $table->id();
            $table->integer('CodeProvince');
            $table->string('ProvinceName');
            $table->integer('CodeRegencyCity');
            $table->string('RegencyNameCity');
            $table->integer('NumberScorePPH');
            $table->string('Unit');
            $table->string('Year');
    });
    Schema::create('MangoProductions', function(Blueprint $table){
        $table->id();
        $table->integer('CodeProvince');
        $table->string('ProvinceName');
        $table->integer('CodeRegency');
        $table->string('RegencyName');
        $table->string('MangoProductions');
        $table->string('Unit');
        $table->string('Year');
    });


}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('ConsumsionTaxs');
        Schema::dropIfExists('MangoProductions');
    }
};
