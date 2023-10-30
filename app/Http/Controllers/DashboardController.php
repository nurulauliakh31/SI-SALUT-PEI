<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\Criteria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        $totalAdmin = User::count();
        $totalProdi = Prodi::count();
        $totalMahasiswa = Mahasiswa::count();
        $totalKriteria = Criteria::count();

        return view('dashboard.admin.admin', compact('totalAdmin','totalProdi', 'totalMahasiswa', 'totalKriteria'));
    }

    public function pimpinan()
    {
        // $totalAdmin = User::count();
        // $totalProdi = Prodi::count();
        // $totalMahasiswa = Mahasiswa::count();
        // $totalKriteria = Criteria::count();
        return view('dashboard.pimpinan.pimpinan');
    }
}
