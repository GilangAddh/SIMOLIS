<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKriteria extends Model
{
    use HasFactory;
    protected $table = 'data_kriteria';
    protected $fillable = ['nama', 'jenis', 'satuan'];

    public function penilaian()
    {
        return $this->hasMany(DataPenilaian::class, 'id_kriteria');
    }
    public function subkriteria()
    {
        return $this->hasMany(DataSubKriteria::class, 'id_kriteria');
    }
}
