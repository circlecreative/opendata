<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(\Database\Seeders\BPS\RiceProductionByDistrictsSeeder::class);
        $this->call(\Database\Seeders\BPS\InflationRatesSeeder::class);
        $this->call(\Database\Seeders\OpenDataJabar\MangoProductionsSeeder::class);
        $this->call(\Database\Seeders\OpenDataJabar\ConsumsionTaxsSeeder::class);
        $this->call(\Database\Seeders\Kominfo\UmkmGoOnlinesSeeder::class);
        $this->call(\Database\Seeders\OpenDataJabar\PondSaltProductionsSeeder::class);
        $this->call(\Database\Seeders\OpenDataJabar\TotalOfEntrepreneursSeeder::class);
        $this->call(\Database\Seeders\BPS\TotalExpenditurePercapitasSeeder::class);
        

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
