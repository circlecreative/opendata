<?php

namespace Database\Seeders\OpenDataJabar;

use App\Models\OpenDataJabar\ConsumsionTaxs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsumsionTaxsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ConsumsionTaxs::truncate();

        $csvData = fopen(base_path('database/csv/OpenDataJabar/ConsumsionTaxs.csv'), 'r');

        if($csvData !==false){
            while(($data = fgetcsv($csvData)) !==false){
                $rowData =[
                    'CodeProvince' => $data[0],
                    'ProvinceName' => $data[1],
                    'CodeRegencyCity'=> $data[2],
                    'RegencyNameCity'=> $data[3],
                    'NumberScorePPH'=> $data[4],
                    'Unit'=> $data[5],
                    'Year'=> $data[6],
                ];
                ConsumsionTaxs::create($rowData);
            }
            fclose($csvData);
        }
    }
}
