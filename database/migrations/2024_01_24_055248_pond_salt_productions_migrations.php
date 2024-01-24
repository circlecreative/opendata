<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('PondSaltProductions', function (Blueprint $table) {
            $table->id();
            $table->integer('CodeRegency');
            $table->string('RegencyName');
            $table->integer('CodeSubdistrict');
            $table->string('NameSubdistrict');
            $table->string('ValueOfSaltProduction');
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
        Schema::dropIfExists('PondSaltProductions');
    }
};
