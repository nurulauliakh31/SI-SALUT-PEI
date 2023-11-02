<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Prodi;

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
        $penilaian = Penilaian::select('periode','alternatif_id')
            ->groupBy('periode','alternatif_id')
            ->get();
        $prodi = Prodi::all();
        return view('dashboard.admin.hasil-keputusan.index', compact('penilaian','prodi'));
    }
}
