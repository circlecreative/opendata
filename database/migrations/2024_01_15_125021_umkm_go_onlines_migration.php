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
        Schema::create('UmkmGoOnlines', function(Blueprint $table)
        {
            $table->id();
            $table->string('LocationOfMarketGrebegActivities');
            $table->integer('OnBoardingAchievements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('UmkmGoOnlines');
    }
};
