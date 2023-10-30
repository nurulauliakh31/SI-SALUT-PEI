<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class NilaiMahasiswa extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'nilai_mahasiswas';

    protected $guarded = [];
    // protected $fillable = [
    //     'id_mahasiswa',
    //     'id_kriteria',
    //     'nilai_mahasiswa',
    // ];

    public $sortable = [
        'id',
        'id_mahasiswa',
        'id_kriteria',
        'nilai_mahasiswa',
        'created_at',
        'updated_at'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }
}
