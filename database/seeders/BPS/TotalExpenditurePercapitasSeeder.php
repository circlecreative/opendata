<?php

namespace Database\Seeders\BPS;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BPS\TotalExpenditurePercapitas;

class TotalExpenditurePercapitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TotalExpenditurePercapitas::truncate();

        $csvData = fopen(base_path('database/csv/BPS/TotalExpenditurePercapitas.csv'), 'r');

        if($csvData !== false){
            while(($data = fgetcsv($csvData)) !==false){
                $rowData = [
                 'CodeProvince' => $data[0],
                 'ProvinceName' => $data[1],
                 'TotalExpenditurePercapitas' => $data[2],
                 'Unit' => $data[3],
                 'Year' => $data[4],
                ];
                TotalExpenditurePercapitas::create($rowData);
            }
            fclose($csvData);
        }
    }
}
