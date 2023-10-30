<?php

namespace App\Http\Controllers\Admin;

use App\Models\NilaiMahasiswa;
use App\Models\Mahasiswa;
use App\Models\Kriteria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NilaiMahasiswaController extends Controller
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
        $mahasiswa = Mahasiswa::all();
        $kriteria = Kriteria::all();

        $query = NilaiMahasiswa::select('nilai_mahasiswas.nilai_mahasiswa', 'nilai_mahasiswas.id_kriteria', 'mahasiswas.name', 'mahasiswas.nim')
            ->join('mahasiswas', 'mahasiswas.id', 'nilai_mahasiswas.id_mahasiswa')
            ->join('kriterias', 'kriterias.id', 'nilai_mahasiswas.id_kriteria')
            ->orderBy('mahasiswas.name', 'ASC')
            ->paginate();

        $result = collect($query);
        $nilai = collect($result['data'])
            ->groupBy('nim')
            ->toArray();

        return view('dashboard.admin.kelola-nilai-mahasiswa.kelola-nilai-mahasiswa', [
            'nilai' => $nilai,
            'mahasiswa' => $mahasiswa,
            'kriteria' => $kriteria,
            'query' => $query,
        ]);
    }

    // public function tambahNilaiMahasiswa(Request $request)
    // {
    //     // $request->validate([
    //     //     'id_mahasiswa' => 'required', // Sesuaikan dengan aturan validasi yang diperlukan
    //     //     'id_kriteria' => 'required', // Sesuaikan dengan aturan validasi yang diperlukan
    //     //     'nilai_mahasiswa' => 'required', // Sesuaikan dengan aturan validasi yang diperlukan
    //     //     // Tambahkan aturan validasi lain jika diperlukan
    //     // ]);

    //     // // Ambil data yang telah divalidasi dari objek Request
    //     //$validatedData = $request->validated();

    //     // // Loop untuk menyimpan data kriteria
    //     // foreach ($validatedData['nilai_mahasiswa'] as $key => $nilai_mahasiswa) {
    //     //     $data = [
    //     //         'id_mahasiswa' => $validatedData['id_mahasiswa'],
    //     //         'id_kriteria' => $id_kriteria,
    //     //         'nilai_mahasiswa' => $validatedData['nilai_mahasiswa'][$key],
    //     //     ];

    //     //     NilaiMahasiswa::create($data);
    //     // }

    //     $id_mahasiswa = $request->input('id_mahasiswa');
    //     $id_kriteria = $request->input('id_kriteria');
    //     $nilai_mahasiswa = $request->input('nilai_mahasiswa');

    //     // Loop untuk menyimpan data kriteria
    //     foreach ($id_kriteria as $key => $id_kriteria) {
    //         $data = [
    //             'id_mahasiswa' => $id_mahasiswa,
    //             'id_kriteria' => $id_kriteria,
    //             'nilai_mahasiswa' => $nilai_mahasiswa[$id_kriteria],
    //         ];

    //         // Lakukan validasi di dalam loop sebelum menyimpan data
    //         $validator = Validator::make($data, [
    //             'id_mahasiswa' => 'required',
    //             'id_kriteria' => 'required',
    //             'nilai_mahasiswa' => 'required',
    //         ]);

    //         // Jika validasi gagal, kembali dengan pesan error
    //         if ($validator->fails()) {
    //             return back()
    //                 ->withErrors($validator)
    //                 ->withInput();
    //         }

    //         // Jika validasi berhasil, lanjutkan untuk menyimpan data ke dalam database
    //         NilaiMahasiswa::create($data);
    //     }

    //     // $request->validate([
    //     //     'id_mahasiswa' => 'required',
    //     //     'id_kriteria' => 'required',
    //     //     'nilai_mahasiswa' => 'required',
    //     // ]);

    //     // $input = $request->all();

    //     // NilaiMahasiswa::create($input);

    //     return redirect()
    //         ->route('kelola-nilai-mahasiswa')
    //         ->with('success', 'Akun berhasil ditambahkan');
    // }

    public function tambahNilaiMahasiswa(Request $request)
    {
        $request->validate([
            'id_mahasiswa' => 'required',
            'id_kriteria' => 'required',
            'nilai_mahasiswa' => 'required',
        ]);

        $input = $request->all();

        NilaiMahasiswa::create($input);

        return redirect()
            ->route('kelola-nilai-mahasiswa')
            ->with('success', 'Akun berhasil ditambahkan');
    }

    // public function editNilaiMahasiswa(Request $request, $nim)
    // {
    //     $request->validate([
    //         'id_mahasiswa' => 'required',
    //         'id_kriteria' => 'required',
    //         'nilai_mahasiswa' => 'required',
    //     ]);

    //     $input = $request->all();

    //     $query = NilaiMahasiswa::select('nilai_mahasiswas.nilai_mahasiswa', 'nilai_mahasiswas.id_kriteria', 'mahasiswas.name', 'mahasiswas.nim')
    //         ->join('mahasiswas', 'mahasiswas.id', 'nilai_mahasiswas.id_mahasiswa')
    //         ->join('kriterias', 'kriterias.id', 'nilai_mahasiswas.id_kriteria')
    //         ->where('mahasiswas.nim', $nim)
    //         ->orderBy('mahasiswas.name', 'ASC');

    //     $result = collect($query);
    //     $nilai = $result->groupBy('nim')->toArray();

    //     // Pastikan data dengan NIM yang sesuai ditemukan sebelum melakukan perubahan
    //     // if (!isset($nilai[$nim])) {
    //     //     return redirect()
    //     //         ->back()
    //     //         ->with('error', 'Data tidak ditemukan');
    //     // }

    //     //$dataToUpdate = $nilai['nim'][0]; // Ambil data pertama dengan NIM yang sesuai
    //     $dataToUpdate['id_mahasiswa'] = $input['id_mahasiswa'];
    //     $dataToUpdate['id_kriteria'] = $input['id_kriteria'];
    //     $dataToUpdate['nilai_mahasiswa'] = $input['nilai_mahasiswa'];

    //     // Lakukan update pada data yang sesuai
    //     $hasil = NilaiMahasiswa::where('id_mahasiswa', $dataToUpdate['id_mahasiswa'])
    //         ->where('id_kriteria', $dataToUpdate['id_kriteria'])
    //         ->update(['nilai_mahasiswa' => $dataToUpdate['nilai_mahasiswa']]);

    //     //dd($dataToUpdate);
    //     return redirect()
    //         ->route('kelola-nilai-mahasiswa')
    //         ->with('success', 'Data berhasil diubah');
    // }

    public function editNilaiMahasiswa(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::where('nim',$nim)->first();
        $kriteria = Kriteria::all();

        $query = NilaiMahasiswa::select('nilai_mahasiswas.nilai_mahasiswa', 'nilai_mahasiswas.id_kriteria', 'mahasiswas.name', 'mahasiswas.nim')
            ->join('mahasiswas', 'mahasiswas.id', 'nilai_mahasiswas.id_mahasiswa')
            ->join('kriterias', 'kriterias.id', 'nilai_mahasiswas.id_kriteria')
            ->orderBy('mahasiswas.name', 'ASC')
            ->paginate();

        $result = collect($query);
        $item = collect($result['data'])
            ->groupBy('nim')
            ->toArray();
        foreach ($kriteria as $j => $row) {
            $idloop= 'nilai_mahasiswa'.$j;
            echo $request->$idloop;
            NilaiMahasiswa::where('id_mahasiswa', $mahasiswa->id)
                ->where('id_kriteria', $row->id)
                ->update(['nilai_mahasiswa' => $request->$idloop]);
        }

        return redirect()
            ->route('kelola-nilai-mahasiswa')
            ->with('success', 'Data berhasil diubah');
    }

    public function nilaimahasiswaDestroy($nim)
    {
        $mahasiswa = Mahasiswa::where('nim',$nim)->first();
        $kriteria = Kriteria::all();

        $query = NilaiMahasiswa::select('nilai_mahasiswas.nilai_mahasiswa', 'nilai_mahasiswas.id_kriteria', 'mahasiswas.name', 'mahasiswas.nim')
            ->join('mahasiswas', 'mahasiswas.id', 'nilai_mahasiswas.id_mahasiswa')
            ->join('kriterias', 'kriterias.id', 'nilai_mahasiswas.id_kriteria')
            ->orderBy('mahasiswas.name', 'ASC')
            ->paginate();

        $result = collect($query);
        $item = collect($result['data'])
            ->groupBy('nim')
            ->toArray();
        foreach ($kriteria as $j => $row) {
            NilaiMahasiswa::where('id_mahasiswa', $mahasiswa->id)
                ->where('id_kriteria', $row->id)
                ->delete();
        }

        return redirect()
            ->route('kelola-nilai-mahasiswa')
            ->with('success', 'Akun berhasil dihapus');
    }
}
