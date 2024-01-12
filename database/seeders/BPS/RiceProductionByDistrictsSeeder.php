<?php

namespace Database\Seeders\BPS;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BPS\RiceProductionByDistricts;

class RiceProductionByDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        RiceProductionByDistricts::truncate();

        $csvData = fopen(base_path('database/csv/BPS/RiceProductionByDistricts.csv'), 'r');

        if($csvData !== false){
            while(($data = fgetcsv($csvData)) !==false){
                $rowData = [
                 'CodeProvince' => $data[0],
                 'ProvinceName' => $data[1],
                 'CodeDistricts' => $data[2],
                 'DistrictsName' => $data[3],
                 'TonsIn2020' => $data[4],
                 'TonsIn2021' => $data[5],
                 'TonsIn2022' => $data[6],
                 'TonsIn2023' => $data[7],
                ];
                RiceProductionByDistricts::create($rowData);
            }
            fclose($csvData);
        }
    }
}
