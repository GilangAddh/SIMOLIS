<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSubKriteria extends Model
{
    use HasFactory;
    protected $table = 'data_sub_kriteria';
    protected $fillable = ['nama', 'bobot', 'id_kriteria'];

    public function kriteria()
    {
        return $this->belongsTo(DataKriteria::class, 'id_kriteria');
    }
}
