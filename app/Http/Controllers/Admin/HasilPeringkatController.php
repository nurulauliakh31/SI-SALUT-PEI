<?php

namespace App\Http\Controllers\Admin;

use App\Models\NilaiMahasiswa;
use App\Models\Mahasiswa;
use App\Models\Kriteria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HasilPeringkatController extends Controller
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

    // public function index()
    // {
    //     $mahasiswa = Mahasiswa::all();
    //     $kriteria = Kriteria::all();

    //     $query = NilaiMahasiswa::select('nilai_mahasiswas.nilai_mahasiswa', 'nilai_mahasiswas.id_kriteria', 'mahasiswas.name', 'mahasiswas.nim')
    //         ->join('mahasiswas', 'mahasiswas.id', 'nilai_mahasiswas.id_mahasiswa')
    //         ->join('kriterias', 'kriterias.id', 'nilai_mahasiswas.id_kriteria')
    //         ->orderBy('mahasiswas.name', 'ASC')
    //         ->paginate();

    //     $result = collect($query);
    //     $nilai = collect($result['data'])
    //         ->groupBy('nim')
    //         ->toArray();

    //     // Calculate the normalized matrix using SAW method
    //     $normalizedMatrix = [];
    //     $maxValues = [];
    //     $minValues = [];

    //     // Find the max and min values for each criterion
    //     foreach ($query as $row) {
    //         $criterionIndex = $row->id_kriteria;
    //         if (!isset($maxValues[$criterionIndex]) || $row->nilai_mahasiswa > $maxValues[$criterionIndex]) {
    //             $maxValues[$criterionIndex] = $row->nilai_mahasiswa;
    //         }

    //         if (!isset($minValues[$criterionIndex]) || $row->nilai_mahasiswa < $minValues[$criterionIndex]) {
    //             $minValues[$criterionIndex] = $row->nilai_mahasiswa;
    //         }
    //     }

    //     // Normalize the matrix
    //     foreach ($query as $row) {
    //         $criterionIndex = $row->id_kriteria;
    //         $normalizedValue = $row->status_kriteria === 'max' ? $row->nilai_mahasiswa / $maxValues[$criterionIndex] : $minValues[$criterionIndex] / $row->nilai_mahasiswa;

    //         if (!isset($normalizedMatrix[$row->id_mahasiswa])) {
    //             $normalizedMatrix[$row->id_mahasiswa] = [
    //                 'id_mahasiswa' => $row->id_mahasiswa,
    //                 'normalized_values' => [],
    //             ];
    //         }

    //         $normalizedMatrix[$row->id_mahasiswa]['normalized_values'][] = $normalizedValue;
    //     }

    //     return view('dashboard.admin.hasil-peringkat.hasil-peringkat', compact('normalizedMatrix', 'kriteria', 'nilai', 'query'));
    //     // return view('dashboard.admin.hasil-peringkat.hasil-peringkat', [
    //     //     'nilai' => $nilai,
    //     //     'mahasiswa' => $mahasiswa,
    //     //     'kriteria' => $kriteria,
    //     //     'query' => $query,
    //     // ]);
    // }

    public function index()
    {
        // Eager loading to retrieve related models
        $mahasiswa = Mahasiswa::all();
        $kriteria = Kriteria::all();

        $query = NilaiMahasiswa::select('nilai_mahasiswas.nilai_mahasiswa', 'nilai_mahasiswas.id_kriteria', 'mahasiswas.name', 'mahasiswas.nim')
            ->join('mahasiswas', 'mahasiswas.id', 'nilai_mahasiswas.id_mahasiswa')
            ->join('kriterias', 'kriterias.id', 'nilai_mahasiswas.id_kriteria')
            ->orderBy('mahasiswas.name', 'ASC')
            ->paginate(10);

        // Use Eloquent collections instead of PHP arrays
        $nilai = $query->groupBy('nim');

        // Calculate the normalized matrix using SAW method
        $normalizedMatrix = [];

        // Find the max and min values for each criterion
        $maxValues = $query->groupBy('id_kriteria')->map(function ($group) {
            return $group->max('nilai_mahasiswa');
        });

        $minValues = $query->groupBy('id_kriteria')->map(function ($group) {
            return $group->min('nilai_mahasiswa');
        });

        // Normalize the matrix
        foreach ($query as $row) {
            $criterionIndex = $row->id_kriteria;
            $normalizedValue = $row->status_kriteria === 'max' ? $row->nilai_mahasiswa / $maxValues[$criterionIndex] : $minValues[$criterionIndex] / $row->nilai_mahasiswa;

            if (!isset($normalizedMatrix[$row->id_mahasiswa])) {
                $normalizedMatrix[$row->id_mahasiswa] = [
                    'id_mahasiswa' => $row->id_mahasiswa,
                    'normalized_values' => [],
                ];
            }

            $normalizedMatrix[$row->id_mahasiswa]['normalized_values'][] = $normalizedValue;
        }

        // Pass the variables to the view
        return view('dashboard.admin.hasil-peringkat.hasil-peringkat', compact('normalizedMatrix', 'kriteria', 'nilai', 'query'));
    }
}
