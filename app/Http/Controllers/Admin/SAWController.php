<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\Prodi;

class SAWController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index()
    {
        $mahasiswa = Mahasiswa::with('penilaian.crips')->get();
        $criteria = Criteria::with('crips')->get();

        // $criteria = Criteria::with('crips')
        //     ->orderBy('nama_criteria', 'ASC')
        //     ->get();
        $penilaian = Penilaian::with('crips', 'mahasiswa')->get();
        //return response()->json($alternatif);
        if (count($penilaian) == 0) {
            return redirect(route('penilaian'));
        }

        //mencari min max
        foreach ($criteria as $key => $value) {
            foreach ($penilaian as $key_1 => $value_1) {
                if ($value->id == $value_1->crips->kriteria_id) {
                    if ($value->attribut == 'Benefit') {
                        $minMax[$value->id][] = $value_1->crips->bobot;
                    } elseif ($value->attribut == 'Cost') {
                        $minMax[$value->id][] = $value_1->crips->bobot;
                    }
                }
            }
        }
        //dd($minMax);

        //normalisasi
        foreach ($penilaian as $key_1 => $value_1) {
            foreach ($criteria as $key => $value) {
                //dd($value_1);
                if ($value->id == $value_1->crips->kriteria_id) {
                    if ($value->attribut == 'Benefit') {
                        $normalisasi[$value_1->mahasiswa->name][$value->id] = $value_1->crips->bobot / max($minMax[$value->id]);
                    } elseif ($value->attribut == 'Cost') {
                        $normalisasi[$value_1->mahasiswa->name][$value->id] = min($minMax[$value->id]) / $value_1->crips->bobot;
                    }
                }
            }
        }
        //dd($normalisasi);

        //perangkingan
        //$rank = [];
        foreach ($normalisasi as $key => $value) {
            foreach ($criteria as $key_1 => $value_1) {
                //dd($key_1);
                $rank[$key][] = $value[$value_1->id] * $value_1->bobot_criteria;
            }
        }
        //dd($key);
        //$ranking = [];
        $ranking = $normalisasi;
        foreach ($normalisasi as $key => $value) {
            $ranking[$key][] = array_sum($rank[$key]);
        }

        arsort($ranking);
        $hasil = Penilaian::with('mahasiswa.prodi')->get();
        $prodi = Prodi::all();
        // dd($penilaian);

        return view('dashboard.admin.perhitungan.index', compact('mahasiswa', 'criteria', 'normalisasi', 'ranking', 'prodi'));
    }

    public function index_pimpinan()
    {
        $mahasiswa = Mahasiswa::with('penilaian.crips')->get();
        $criteria = Criteria::with('crips')->get();
        $penilaian = Penilaian::with('crips', 'mahasiswa')->get();
        //return response()->json($alternatif);
        if (count($penilaian) == 0) {
            return redirect(route('penilaian'));
        }

        //mencari min max
        foreach ($criteria as $key => $value) {
            foreach ($penilaian as $key_1 => $value_1) {
                if ($value->id == $value_1->crips->kriteria_id) {
                    if ($value->attribut == 'Benefit') {
                        $minMax[$value->id][] = $value_1->crips->bobot;
                    } elseif ($value->attribut == 'Cost') {
                        $minMax[$value->id][] = $value_1->crips->bobot;
                    }
                }
            }
        }
        //dd($minMax);

        //normalisasi
        foreach ($penilaian as $key_1 => $value_1) {
            foreach ($criteria as $key => $value) {
                if ($value->id == $value_1->crips->kriteria_id) {
                    if ($value->attribut == 'Benefit') {
                        $normalisasi[$value_1->mahasiswa->name][$value_1->prodi->nama_prodi][$value->id] = $value_1->crips->bobot / max($minMax[$value->id]);
                    } elseif ($value->attribut == 'Cost') {
                        $normalisasi[$value_1->mahasiswa->name][$value_1->prodi->nama_prodi][$value->id] = min($minMax[$value->id]) / $value_1->crips->bobot;
                    }
                }
            }
        }
        //dd($normalisasi);

        //perangkingan
        //$rank = [];
        foreach ($normalisasi as $key => $value) {
            foreach ($criteria as $key_1 => $value_1) {
                //dd($key_1);
                $rank[$key][] = $value[$value_1->id] * $value_1->bobot_criteria;
            }
        }
        // dd($rank);
        //$ranking = [];
        $ranking = $normalisasi;
        foreach ($normalisasi as $key => $value) {
            $ranking[$key][] = array_sum($rank[$key]);
        }

        arsort($ranking);
        // dd($ranking);



        return view('dashboard.admin.perhitungan.indexpimpinan', compact('mahasiswa', 'criteria', 'normalisasi', 'ranking'));
    }
}
