<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAlternatif extends Model
{
    use HasFactory;
    protected $table = 'data_alternatif';
    protected $fillable = ['nama', 'gambar'];

    public function penilaian()
    {
        return $this->hasMany(DataPenilaian::class, 'id_alternatif');
    }
}
