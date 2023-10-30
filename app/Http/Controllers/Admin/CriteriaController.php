<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Crips;

class CriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $criteria = Criteria::orderBy('nama_kriteria', 'ASC')->get();
        // return view('dashboard.admin.kriteria.index', compact('criteria'));
        $criteria = Criteria::get();

        return view('dashboard.admin.kriteria.index', compact('criteria'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_criteria' => 'required|string',
            'attribut' => 'required|string',
            'bobot_criteria' => 'required|numeric',
        ]);

        try {
            $criteria = new Criteria();
            $criteria->nama_criteria = $request->nama_criteria;
            $criteria->attribut = $request->attribut;
            $criteria->bobot_criteria = $request->bobot_criteria;
            $criteria->save();

            return back()->with('msg', 'Berhasil menambahkan data');
        } catch (Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            die("Gagal");
        }
    }

    // public function edit($id)
    // {
    //     $kriteria = Criteria::findOrFail($id);
    //     return view('admin.kriteria.edit', compact('kriteria'));
    // }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_criteria' => 'required|string',
            'attribut' => 'required|string',
            'bobot_criteria' => 'required|numeric',
        ]);

        try {
            $criteria = Criteria::findOrFail($id);
            $criteria->update([
                'nama_criteria'  => $request->nama_criteria,
                'attribut'       => $request->attribut,
                'bobot_criteria' => $request->bobot_criteria,
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
            $criteria = Criteria::findOrFail($id);
            $criteria->delete();
        } catch (Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            die("Gagal");
        }
    }

    public function show($id)
    {
        $crips = Crips::where('kriteria_id', $id)->get();
        $criteria = Criteria::findOrFail($id);
        return view('dashboard.admin.kriteria.show', compact('crips', 'criteria'));
    }
}
