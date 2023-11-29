<?php

namespace Database\Seeders;

use App\Models\Consumsion_Taxs;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Consumsion_TaxsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Consumsion_Taxs::truncate();

        $csvData = fopen(base_path('database/csv/consumsion_taxs.csv'), 'r');

        if($csvData !== false){
            while(($data = fgetcsv($csvData)) !== false){
                //proses setipa baris dari csv
                $rowData = [
                    'id' => $data[0],
                    'code_province' => $data[1],
                    'province_name' => $data[2],
                    'code_regency_city'=> $data[3],
                    'regency_name_city' => $data[4],
                    'number_score_pph' => $data[5],
                    'unit' => $data[6],
                    'year'=> $data[7],

                ];
                Consumsion_Taxs::create($rowData);//simpan data kedalam model
            }
            fclose($csvData); //tutup file csv
        }
    }
}
