<?php

namespace Database\Seeders;

use App\Models\MangoProductions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MangoProductionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        MangoProductions::truncate();

        $csvData = fopen(base_path('database/csv/MangoProductions.csv'), 'r');

        if($csvData !== false){
            while(($data = fgetcsv($csvData)) !==false){
                $rowData = [
                 'CodeProvince' => $data[0],
                 'ProvinceName' => $data[1],
                 'CodeRegency' => $data[2],
                 'RegencyName' => $data[3],
                 'MangoProductions' => $data[4],
                 'Unit' => $data[5],
                 'Year' => $data[6],

                ];
                MangoProductions::create($rowData);
            }
            fclose($csvData);
        }
    }
}
