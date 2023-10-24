<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kondisi = [
            [
                'nama' => 'Baik',
            ],
            [
                'nama' => 'Buruk',
            ],

        ];

        DB::table('kondisi')->insert($kondisi);
    }
}
