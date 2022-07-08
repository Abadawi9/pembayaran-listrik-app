<?php

namespace Database\Seeders;

use App\Models\Tarif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'daya' => '1',
                'tarif' => '1',
                'beban' => '1',
            ],
            [
                'daya' => '2',
                'tarif' => '2',
                'beban' => '2',
            ],
            [
                'daya' => '3',
                'tarif' => '3',
                'beban' => '3',
            ],
            [
                'daya' => '4',
                'tarif' => '4',
                'beban' => '4',
            ],
            
        ];

        Tarif::insert($data);
    }
}
