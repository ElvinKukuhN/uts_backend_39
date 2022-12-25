<?php

namespace App\Http\Controllers;

use App\Models\Agama39;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Agama39Controller extends Controller
{
    public function agamaPage39()
    {
        $agama = Agama39::all();

        return view('agama', ['all_agama' => $agama]);
    }

    public function editAgamaPage39(Request $request)
    {
        $id = $request->id;

        $agama = Agama39::find($id);

        if (!$agama) {
            return back()->with('error', 'Agama tidak ditemukan');
        }

        $all_agama = Agama39::all();

        return view('agama', ['all_agama' => $all_agama, 'agama' => $agama]);
    }

    public function updateAgama39(Request $request)
    {
        $id = $request->id;
        $agama = Agama39::find($id);

        if (!$agama) {
            return redirect('/agama39')->with('error', 'Agama tidak ditemukan');
        }

        $request->validate([
            'nama_agama' => 'required'
        ]);

        $updateAgama = $agama->update([
            'nama_agama' => $request->nama_agama
        ]);

        if ($updateAgama) {
            return redirect('/agama39')->with('success', 'Agama berhasil diubah');
        } else {
            return redirect('/agama39')->with('error', 'Agama gagal diubah');
        }
    }

    public function createAgama39(Request $request)
    {
        $request->validate([
            'nama_agama' => 'required'
        ]);

        $createAgama = Agama39::create([
            'nama_agama' => $request->nama_agama
        ]);

        if ($createAgama) {
            return back()->with('success', 'Agama berhasil ditambahkan');
        } else {
            return back()->with('error', 'Agama gagal ditambahkan');
        }
    }

    public function deleteAgama39(Request $request)
    {
        $id = $request->id;
        $agama = Agama39::find($id);

        if (!$agama) {
            return redirect('/agama39')->with('error', 'Agama tidak ditemukan');
        }

        $deleteAgama = $agama->delete();


        if ($deleteAgama) {
            return redirect('/agama39')->with('success', 'Agama berhasil dihapus');
        } else {
            return redirect('/agama39')->with('error', 'Agama gagal dihapus');
        }
    }
}
