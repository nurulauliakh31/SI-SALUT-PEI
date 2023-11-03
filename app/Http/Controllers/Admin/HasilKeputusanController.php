<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Prodi;
use App\Models\Rangking;

class HasilKeputusanController extends Controller
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
        // $penilaian = Penilaian::select('periode', 'alternatif_id')
        //     ->groupBy('periode', 'alternatif_id')
        //     ->get();
        // $prodi = Prodi::all();
        $penilaian = Rangking::select('rangking.*', 'm.name', 'p.nama_prodi')
            ->join('mahasiswas as m', 'm.id', 'rangking.mahasiswas_id')
            ->join('prodis as p', 'p.id', 'm.id_prodi')
            ->get();
        return view('dashboard.admin.hasil-keputusan.index', compact('penilaian'));
    }

    public function rangking(Request $request)
    {
        // print_r($request->input());
        $create = Rangking::updateOrCreate(
            [
                'mahasiswas_id' => $request->input('siswa'),
                'nilai' => $request->input('hasil'),
                'rangking' => $request->input('rangking'),
                'periode' => $request->input('periode'),
            ],
            [
                'nilai' => $request->input('hasil'), 'rangking' => $request->input('rangking'),
            ]
        );

        return response()->json($create);
    }
}
