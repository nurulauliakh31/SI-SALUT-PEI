<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
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
        $mahasiswa = Mahasiswa::with('prodi')->paginate(10);
        $prodi = Prodi::all();

        return view('dashboard.admin.kelola-mahasiswa.kelola-mahasiswa', [
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi
        ]);
    }

    public function tambahMahasiswa(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'id_prodi' => 'required',
            'angkatan' => 'required',
        ]);

        $input = $request->all();

        Mahasiswa::create($input);

        return redirect()->route('kelola-mahasiswa')->with('success', 'Akun berhasil ditambahkan');
    }

    public function editMahasiswa(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'id_prodi' => 'required',
            'angkatan' => 'required',
            'updated_at' => now(),
        ]);

        $input = $request->all();
        $mahasiswa->update($input);

        return redirect()->route('kelola-mahasiswa')->with('success', 'Akun berhasil diubah');
    }

    public function mahasiswaDestroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect()->route('kelola-mahasiswa')->with('success', 'Akun berhasil dihapus');
    }
}
