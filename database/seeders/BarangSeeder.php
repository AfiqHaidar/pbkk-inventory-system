<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = [
            [
                'nama' => 'Makanan',
            ],
            [
                'nama' => 'Minuman',
            ],
            [
                'nama' => 'Pakaian',
            ],
            [
                'nama' => 'Hewan',
            ],

        ];

        DB::table('jenis')->insert($jenis);

        $kondisi = [
            [
                'nama' => 'Istimewa',
            ],
            [
                'nama' => 'Buruk',
            ],
            [
                'nama' => 'Baik',
            ],


        ];

        DB::table('kondisi')->insert($kondisi);

        Barang::factory()->count(5)->create();
    }
}
