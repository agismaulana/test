<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiPegawai extends Model
{
    use HasFactory;

    protected $table = 'gaji_pegawai';
    protected $fillable = ['waktu', 'id_pegawai', 'total_diterima'];

    public function pegawai() {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id');
    }
}
