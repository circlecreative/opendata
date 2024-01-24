<?php

namespace Database\Seeders\Kominfo;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kominfo\UmkmGoOnlines;

class UmkmGoOnlinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UmkmGoOnlines::truncate();

        $csvData = fopen(base_path('database/csv/Kominfo/UmkmGoOnlines.csv'), 'r');

        if ($csvData !== false) {
            while (($data = fgetcsv($csvData)) !== false) {
                $rowData = [
                    'LocationOfMarketGrebegActivities' => $data[0],
                    'OnBoardingAchievements' => $data[1],
                ];
                UmkmGoOnlines::create($rowData);
            }
            fclose($csvData);
        }
    }
}
