<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prodi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdiController extends Controller
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

     public function indexprodi()
    {
        $prodis = Prodi::paginate(5);

        return view('dashboard.admin.kelola-prodi.kelola-prodi', compact('prodis'));
    }

    public function tambahProdi(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required'
        ]);

        $prodi = new Prodi();
        $prodi->nama_prodi = $request->nama_prodi;

        $prodi->save();
        return redirect()->route('kelola-prodi')->with('success', 'Akun berhasil ditambahkan');
    }

    public function editProdi(Request $request, $id)
    {
        $request->validate([
            'nama_prodi' => '',
        ]);

        $prodi = Prodi::find($id);
        $prodi->nama_prodi = $request->nama_prodi;

        $prodi->save();

        return redirect()->route('kelola-prodi')->with('success', 'Akun berhasil diubah');
    }

    public function prodiDestroy($id)
    {
        $prodi = Prodi::find($id);
        $prodi->delete();

        return redirect()->route('kelola-prodi')->with('success', 'Akun berhasil dihapus');
    }
}
