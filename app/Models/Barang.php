<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = ['nama', 'keterangan', 'kecacatan', 'jumlah', 'gambar', 'jenis_id', 'kondisi_id', 'user_id'];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
