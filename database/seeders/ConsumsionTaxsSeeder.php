<?php

namespace Database\Seeders;

use \App\Models\ConsumsionTaxs;
use Illuminate\Support\Facades\DB;
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

        $csvData = fopen(base_path('database/csv/consumsiontaxs.csv'), 'r');

        if($csvData !== false){
            while(($data = fgetcsv($csvData)) !== false){
                //proses setiap baris dari csv
                $rowData = [
                    'id' => $data[0],
                    'CodeProvince' => $data[1],
                    'ProvinceName' => $data[2],
                    'CodeRegencyCity'=> $data[3],
                    'RegencyNameCity' => $data[4],
                    'NumberScorePPH' => $data[5],
                    'Unit' => $data[6],
                    'Year'=> $data[7],

                ];
                ConsumsionTaxs::create($rowData);//simpan data kedalam model
            }
            fclose($csvData); //tutup file csv
        }
    }
}
