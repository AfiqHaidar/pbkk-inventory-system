<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Barang;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Barang::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'keterangan' => $this->faker->sentence,
            'kecacatan' => $this->faker->sentence,
            'jumlah' => $this->faker->numberBetween(1, 100),
            'gambar' => 'barang/' . $this->faker->image('public/storage/barang', 400, 300, null, false),
            'jenis_id' => $this->faker->numberBetween(1, 4), // ada 4 Jenis barang pada Jenis
            'kondisi_id' => $this->faker->numberBetween(1, 3), // ada 3 Kondisi barang pada Kondisi
            'user_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
