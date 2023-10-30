<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AkunController extends Controller
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
        $users = User::get();

        return view('dashboard.admin.kelola-akun.kelola-akun', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'role' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->role = $request->role;

        if ($image = $request->file('foto_profil')) {
            $destinationPath = 'admin_img/';
            $admin_image = $image->getClientOriginalName();
            $image->move($destinationPath, $admin_image);
            $user['foto_profil'] = "$admin_image";
        }

        $user->save();

        return back()->with('msg', 'Berhasil menambahkan data');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'foto_profil' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => '',
            'role' => '',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->role = $request->role;

        if ($image = $request->file('foto_profil')) {
            $destinationPath = 'admin_img/';
            $admin_image = $image->getClientOriginalName();
            $image->move($destinationPath, $admin_image);
            $user['foto_profil'] = "$admin_image";
        }

        $user->save();

        // return redirect()->route('kelola-akun-admin')->with('success', 'Akun berhasil diubah');
        return back()->with('msg', 'Berhasil merubah data');
    }

    public function destroy($id)
    {
        // $user = User::find($id);
        // $user->delete();

        // return redirect()->route('kelola-akun-admin')->with('success', 'Akun berhasil dihapus');
        try {
            $user = User::findOrFail($id);
            $user->delete();

        } catch (Exception $e) {
            \Log::emergency("File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
            die("Gagal");
        }
    }
}
