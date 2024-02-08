<?php

namespace Database\Seeders\OpenDataJabar;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OpenDataJabar\TotalOfEntrepreneurs;
class TotalOfEntrepreneursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TotalOfEntrepreneurs::truncate();
        $csvData = fopen(base_path('database/csv/OpenDataJabar/TotalOfEntrepreneurs.csv'), 'r');
        if($csvData !== false){
            while(($data = fgetcsv($csvData)) !==false){
                $rowData = [
                    'CodeProvinces'=> $data[0],
                    'ProvincesName'=> $data[1],
                    'CodeRegencyCity'=> $data[2],
                    'RegencyNameCity'=> $data[3],
                    'TypeOfBusiness'=> $data[4],
                    'TotalEntrepreneurs'=> $data[5],
                    'Entity'=> $data[6],
                    'Year'=> $data[7],
                ];
                TotalOfEntrepreneurs::create($rowData);
            }
            fclose($csvData);
        }
    }
}
