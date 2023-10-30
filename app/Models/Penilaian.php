<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'nilaimhs';
    protected $guarded = [];

    public function crips()
    {
        return $this->belongsTo(Crips::class, 'crips_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'alternatif_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

}
