<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
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
                'nama' => 'Pakaian',
            ],

        ];

        DB::table('jenis')->insert($jenis);
    }
}
