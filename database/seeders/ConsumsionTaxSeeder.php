<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use App\Models\ConsumsionTax;
use Illuminate\Support\LazyCollection;
use Illuminate\Database\Seeder;

class ConsumsionTaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
        
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3201,
                'regency_name_city' => 'KABUPATEN BOGOR',
                'number_score_pph' => 81,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
              
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3202,
                'regency_name_city' => 'KABUPATEN SUKABUMI',
                'number_score_pph' => 77,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3203,
                'regency_name_city' => 'KABUPATEN CIANJUR',
                'number_score_pph' => 85,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
               
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3204,
                'regency_name_city' => 'KABUPATEN BANDUNG',
                'number_score_pph' => 81,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
               
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3205,
                'regency_name_city' => 'KABUPATEN GARUT',
                'number_score_pph' => 93,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
               
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3206,
                'regency_name_city' => 'KABUPATEN TASIKMALAYA',
                'number_score_pph' => 81,
                'unit' => 'POINT',
                'year' => 2021],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3207,
                'regency_name_city' => 'KABUPATEN CIAMIS',
                'number_score_pph' => 95,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
               
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3208,
                'regency_name_city' => 'KABUPATEN KUNINGAN',
                'number_score_pph' => 71,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3209,
                'regency_name_city' => 'KABUPATEN CIREBON',
                'number_score_pph' => 95,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3210,
                'regency_name_city' => 'KABUPATEN MAJALENGKA',
                'number_score_pph' => 85,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
               
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3211,
                'regency_name_city' => 'KABUPATEN SUMEDANG',
                'number_score_pph' => 94,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3212,
                'regency_name_city' => 'KABUPATEN INDRAMAYU',
                'number_score_pph' => 93,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3213,
                'regency_name_city' => 'KABUPATEN SUBANG',
                'number_score_pph' => 93,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
               
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3214,
                'regency_name_city' => 'KABUPATEN PURWAKARTA',
                'number_score_pph' => 89,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3215,
                'regency_name_city' => 'KABUPATEN KARAWANG',
                'number_score_pph' => 87,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
               
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3216,
                'regency_name_city' => 'KABUPATEN BEKASI',
                'number_score_pph' => 86,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3217,
                'regency_name_city' => 'KABUPATEN BANDUNG BARAT',
                'number_score_pph' => 88,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
               
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3218,
                'regency_name_city' => 'KABUPATEN PANGANDARAN',
                'number_score_pph' => 82,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3271,
                'regency_name_city' => 'KOTA BOGOR',
                'number_score_pph' => 86,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3272,
                'regency_name_city' => 'KOTA SUKABUMI',
                'number_score_pph' => 94,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3273,
                'regency_name_city' => 'KOTA BANDUNG',
                'number_score_pph' => 88,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
               
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3274,
                'regency_name_city' => 'KOTA CIREBON',
                'number_score_pph' => 82,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
               
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3275,
                'regency_name_city' => 'KOTA BEKASI',
                'number_score_pph' => 83,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3276,
                'regency_name_city' => 'KOTA DEPOK',
                'number_score_pph' => 88,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
             
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3277,
                'regency_name_city' => 'KOTA CIMAHI',
                'number_score_pph' => 86,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3278,
                'regency_name_city' => 'KOTA TASIKMALAYA',
                'number_score_pph' => 84,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3279,
                'regency_name_city' => 'KOTA BANJAR',
                'number_score_pph' => 91,
                'unit' => 'POINT',
                'year' => 2021,
            ],
            [
               
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3201,
                'regency_name_city' => 'KABUPATEN BOGOR',
                'number_score_pph' => 90,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3202,
                'regency_name_city' => 'KABUPATEN SUKABUMI',
                'number_score_pph' => 94,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3203,
                'regency_name_city' => 'KABUPATEN CIANJUR',
                'number_score_pph' => 80,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3204,
                'regency_name_city' => 'KABUPATEN BANDUNG',
                'number_score_pph' => 82,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3205,
                'regency_name_city' => 'KABUPATEN GARUT',
                'number_score_pph' => 83,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3206,
                'regency_name_city' => 'KABUPATEN TASIKMALAYA',
                'number_score_pph' => 93,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
               
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3207,
                'regency_name_city' => 'KABUPATEN CIAMIS',
                'number_score_pph' => 95,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3208,
                'regency_name_city' => 'KABUPATEN KUNINGAN',
                'number_score_pph' => 94,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3209,
                'regency_name_city' => 'KABUPATEN CIREBON',
                'number_score_pph' => 96,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3210,
                'regency_name_city' => 'KABUPATEN MAJALENGKA',
                'number_score_pph' => 93,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3211,
                'regency_name_city' => 'KABUPATEN SUMEDANG',
                'number_score_pph' => 94,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3212,
                'regency_name_city' => 'KABUPATEN INDRAMAYU',
                'number_score_pph' => 96,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
            
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3213,
                'regency_name_city' => 'KABUPATEN SUBANG',
                'number_score_pph' => 93,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3214,
                'regency_name_city' => 'KABUPATEN PURWAKARTA',
                'number_score_pph' => 90,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
            
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3215,
                'regency_name_city' => 'KABUPATEN KARAWANG',
                'number_score_pph' => 88,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3216,
                'regency_name_city' => 'KABUPATEN BEKASI',
                'number_score_pph' => 88,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3217,
                'regency_name_city' => 'KABUPATEN BANDUNG BARAT',
                'number_score_pph' => 93,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
            
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3218,
                'regency_name_city' => 'KABUPATEN PANGANDARAN',
                'number_score_pph' => 94,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3271,
                'regency_name_city' => 'KOTA BOGOR',
                'number_score_pph' => 83,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3272,
                'regency_name_city' => 'KOTA SUKABUMI',
                'number_score_pph' => 86,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3273,
                'regency_name_city' => 'KOTA BANDUNG',
                'number_score_pph' => 89,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3274,
                'regency_name_city' => 'KOTA CIREBON',
                'number_score_pph' => 93,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3275,
                'regency_name_city' => 'KOTA BEKASI',
                'number_score_pph' => 94,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3276,
                'regency_name_city' => 'KOTA DEPOK',
                'number_score_pph' => 89,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3277,
                'regency_name_city' => 'KOTA CIMAHI',
                'number_score_pph' => 90,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
                
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3278,
                'regency_name_city' => 'KOTA TASIKMALAYA',
                'number_score_pph' => 92,
                'unit' => 'POINT',
                'year' => 2022,
            ],
            [
            
                'code_province' => 32,
                'province_name' => 'JAWA BARAT',
                'code_regency_city' => 3279,
                'regency_name_city' => 'KOTA BANJAR',
                'number_score_pph' => 96,
                'unit' => 'POINT',
                'year' => 2022,
            ],
        ];

        //memasukkan data ke dalam tabel ConsumsionTax menggunakan mode ConsumsionTax
        foreach ($data as $item){
            ConsumsionTax::create($item);
        }
    }
}
