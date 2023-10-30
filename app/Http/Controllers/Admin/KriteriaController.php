<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kriteria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KriteriaController extends Controller
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
        $kriteria = Kriteria::paginate(8);

        return view('dashboard.admin.kelola-kriteria.kelola-kriteria', compact('kriteria'));
    }

    public function tambahKriteria(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'status_kriteria' => 'required',
        ]);

        $input = $request->all();

        Kriteria::create($input);

        return redirect()->route('kelola-kriteria')->with('success', 'Akun berhasil ditambahkan');
    }

    public function editKriteria(Request $request, $id)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'status_kriteria' => 'required',
        ]);

        $input = $request->all();
        $kriteria = Kriteria::find($id);
        $kriteria->update($input);

        return redirect()->route('kelola-kriteria')->with('success', 'Akun berhasil diubah');
    }

    public function kriteriaDestroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();

        return redirect()->route('kelola-kriteria')->with('success', 'Akun berhasil dihapus');
    }
}
