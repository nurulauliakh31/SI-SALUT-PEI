<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    use HasFactory;

    protected $table = 'bobots';

    protected $fillable = [
        'id_kriteria',
        'nilai_bobot',
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }
}
