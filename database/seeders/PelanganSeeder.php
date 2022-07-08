<?php

namespace Database\Seeders;

use App\Models\Pelangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelanganSeeder extends Seeder
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
                'nama' => 'Pelanggan 1',
                'alamat' => 'Jl. Raya',
                'no_telp' => '081234567890',
                'no_meter' => '1234567890',
                'tarif_id' => 1,
            ],
            [
                'nama' => 'Pelanggan 2',
                'alamat' => 'Jl. Raya',
                'no_telp' => '081234567890',
                'no_meter' => '1234567890',
                'tarif_id' => 2,
            ],
        ];

        Pelangan::insert($data);
    }
}
