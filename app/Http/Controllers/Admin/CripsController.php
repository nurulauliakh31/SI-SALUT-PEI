<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Crips;

class CripsController extends Controller
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
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'kriteria_id'=> 'required|numeric',
            'nama_crips' => 'required|string',
            'bobot'      => 'required|numeric',
        ]);

        try {
            $crips = new Crips();
            $crips->kriteria_id = $request->kriteria_id;
            $crips->nama_crips = $request->nama_crips;
            $crips->bobot = $request->bobot;
            $crips->save();

            return back()->with('msg', 'Berhasil menambahkan data');
        } catch (Exception $e) {
            \Log::emergency("File:" . $e->getFile() . "Line:" . $e->getLine() . "Message:" . $e->getMessage() );
            die("Gagal");
        }
    }

    public function edit($id)
    {
        $crips = Crips::findOrFail($id);

        return view('admin.crips.edit', compact('crips'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_crips' => 'required|string',
            'bobot' => 'required|numeric',
        ]);

        try {
            $crips = Crips::findOrFail($id);
            $crips->update([
                'nama_crips'  => $request->nama_crips,
                'bobot'       => $request->bobot,
            ]);

            return back()->with('msg', 'Berhasil merubah data');
        } catch (Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            die("Gagal");
        }
    }

    public function destroy($id)
    {
        try {
            $crips = Crips::findOrFail($id);
            $crips->delete();
        } catch (Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            die("Gagal");
        }
    }
}
