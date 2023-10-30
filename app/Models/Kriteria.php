<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriterias';

    protected $guarded = [];
    // protected $fillable = [
    //     'nama_kriteria',
    //     'status_kriteria',
    // ];

    public function bobot()
    {
        return $this->hasMany(Bobot::class);
    }

    public function nilaimahasiswa()
    {
        return $this->hasMany(NilaiMahasiswa::class);
    }
}
