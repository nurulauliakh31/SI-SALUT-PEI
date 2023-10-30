<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Mahasiswa;
use App\Models\Criteria;
use App\Models\Prodi;

class PenilaianController extends Controller
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
        $mahasiswa = Mahasiswa::with('penilaian.crips')->orderBy('name', 'ASC')->get();
        $criteria = Criteria::with('crips')->get();
        // $prodi = Prodi::with('crips')->get();
        //return response()->json($alternatif);
        //return view('dashboard.admin.penilaian.penilaian-calonlulusan', compact('mahasiswa', 'criteria'));
        return view('dashboard.admin.penilaian.index', compact('mahasiswa', 'criteria'));
    }

    public function store(Request $request)
    {
        // return response()->json($request);
        // $alternatif = count($request->crips_id);
        // dd($alternatif);
        try {
            DB::select("TRUNCATE nilaimhs");

            $input = $request->periode;
            foreach ($request->crips_id as $key => $value) {
                foreach ($value as $key_1 => $value_1) {
                    Penilaian::create([
                        'alternatif_id' => $key,
                        'periode' => $input,
                        'crips_id' => $value_1,
                    ]);
                }
            }

            // foreach ($request->crips_id as $key => $value) {
            //     foreach ($value as $key_1 => $value_1) {
            //         Penilaian::create([
            //             'alternatif_id' => $key,
            //             'prodi_id' => $key,
            //             'crips_id' => $value_1,
            //         ]);
            //         //dd($value_1);
            //     }
            // }

            return back()->with('msg', 'Data berhasil disimpan');
        } catch (Exception $e) {
            \Log::emergency('File:' . $e->getFile() . 'Line:' . $e->getLine() . 'Message:' . $e->getMessage());
            die('Gagal');
        }
    }
}
