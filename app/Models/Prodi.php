<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodis';

    protected $guarded = [];
    // protected $fillable = [
    //     'id',
    //     'nama_prodi',
    // ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

}
