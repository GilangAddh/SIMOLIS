<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenilaian extends Model
{
    use HasFactory;
    protected $table = 'data_penilaian';
    protected $fillable = ['id_alternatif', 'id_kriteria', 'nilai'];

    public function alternatif()
    {
        return $this->belongsTo(DataAlternatif::class, 'id_alternatif');
    }

    // Relasi dengan DataKriteria
    public function kriteria()
    {
        return $this->belongsTo(DataKriteria::class, 'id_kriteria');
    }
}
