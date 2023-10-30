<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bobot;
use App\Models\Kriteria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BobotController extends Controller
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
        $bobot = Bobot::join('kriterias', 'kriterias.id', '=', 'bobots.id')
            ->select('bobots.*', 'kriterias.nama_kriteria')
            ->paginate(8);
        $kriteria = Kriteria::all();

        return view('dashboard.admin.kelola-bobot.kelola-bobot', compact('bobot', 'kriteria'));
    }

    public function tambahBobot(Request $request)
    {
        $request->validate([
            'id_kriteria' => 'required',
            'nilai_bobot' => 'required',
        ]);

        $input = $request->all();

        Bobot::create($input);

        return redirect()->route('kelola-bobot')->with('success', 'Akun berhasil ditambahkan');
    }

    public function editBobot(Request $request, $id)
    {
        $bobot = Bobot::find($id);
        $request->validate([
            'id_kriteria' => 'required',
            'nilai_bobot' => 'required',
            'updated_at' => now(),
        ]);

        $input = $request->all();
        $bobot->update($input);

        return redirect()->route('kelola-bobot')->with('success', 'Akun berhasil diubah');
    }

    public function bobotDestroy($id)
    {
        $bobot = Bobot::find($id);
        $bobot->delete();

        return redirect()->route('kelola-bobot')->with('success', 'Akun berhasil dihapus');
    }
}
