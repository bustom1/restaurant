<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Database\QueryException;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('manager.client.index', [
            'title' => 'Data Client',
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.client.create', [
            'title' => 'Tambah Data Client',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required',
            'role' => 'required|max:50',

        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->role = $request->role;

        if ($user->save()) {
            return redirect()->route('manager.client.index')->with('success', 'Data Berhasil di tambahkan');
        } else {
            return back()->withInput()->with('error', 'Gagal menambah data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id_users)
    {
        $user = User::find($id_users);
        return \view('manager.client.edit', [
            'title' => 'Form tambah data clients',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:6',
            'phone' => 'required',
            'role' => 'required|max:50',
        ]);

        // cek keberadaan email di database
        if ($request->has('email')) {
            // Hapus email pengguna jika ada
            try {
                User::where('email', $request->email)->delete();
            } catch (QueryException $e) {
                return redirect()->back()->with('failed', 'Gagal menghapus email .');
            }
            // simpan email yg telah d perbaharui ke db
            $user->email = $request->email;
        }
        // simpan ke db
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->role = $request->role;

        // Simpan perubahan ke dalam database
        if ($user->save()) {
            return redirect()->route('manager.client.index')->with('success', 'Data User telah diperbarui');
        } else {
            return redirect()->back()->with('failed', 'Gagal memperbarui Data User');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($clients)
    {
        $client = User::find($clients);

        if (!$client) {
            return redirect()->route('manager.client.index')->with('failed', 'Data tidak ditemukan');
        }

        $delete = $client->delete();

        if ($delete) {
            return redirect()->route('manager.client.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('manager.client.index')->with('failed', 'Data gagal dihapus');
        }
    }
}
