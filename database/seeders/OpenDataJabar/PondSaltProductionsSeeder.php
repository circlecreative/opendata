<?php

namespace Database\Seeders\OpenDataJabar;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OpenDataJabar\PondSaltProductions;


class PondSaltProductionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PondSaltProductions::truncate();
        $csvData = fopen(base_path('database/csv/OpenDataJabar/PondSaltProductions.csv'), 'r');
        if($csvData !== false){
            while(($data = fgetcsv($csvData)) !==false){
                $rowData = [
                    'CodeRegency'=> $data[0],
                    'RegencyName'=> $data[1],
                    'CodeSubdistrict'=> $data[2],
                    'NameSubdistrict'=> $data[3],
                    'ValueOfSaltProduction'=> $data[4],
                    'Unit'=> $data[5],
                    'Year'=> $data[6],
                ];
                PondSaltProductions::create($rowData);
            }
            fclose($csvData);
        }
    }
}
