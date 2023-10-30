<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $guarded = [];
    // protected $fillable = [
    //     'nim',
    //     'name',
    //     'id_prodi',
    //     'angkatan',
    // ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    // public function nilaimahasiswa()
    // {
    //     return $this->hasMany(NilaiMahasiswa::class);
    // }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'alternatif_id');
    }
}
