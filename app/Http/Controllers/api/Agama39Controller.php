<?php

namespace App\Http\Controllers\api;

use App\Models\Agama39;
use Database\Seeders\Agama;
use Illuminate\Http\Request;
use App\Http\Resources\FormatApi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Agama39Controller extends Controller
{
    public function getAgama39(Request $request)
    {
        $agama = Agama39::all();

        return new FormatApi(true, 'Berhasil mendapatkan data agama', $agama);
    }

    public function getDetailAgama39(Request $request, $id)
    {
        $agama = Agama39::find($id);

        if (!$agama) {
            return new FormatApi(false, 'Agama tidak ditemukan', null);
        }

        return new FormatApi(true, 'Berhasil mendapatkan data agama', $agama);
    }

    public function postAgama39(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_agama' => 'required',
        ]);

        if ($validator->fails()) {
            return new FormatApi(false, 'Validasi gagal', $validator->errors()->all());
        }

        $createUser = Agama39::create([
            'nama_agama' => $request->nama_agama,
        ]);

        if ($createUser) {
            return new FormatApi(true, 'Berhasil menambahkan data agama', $createUser);
        } else {
            return new FormatApi(false, 'Gagal menambahkan data agama', null);
        }
    }

    public function putAgama39(Request $request, $id)
    {
        $agama = Agama39::find($id);

        if (!$agama) {
            return new FormatApi(false, 'Agama tidak ditemukan', null);
        }

        $validator = Validator::make($request->all(), [
            'nama_agama' => 'required',
        ]);

        if ($validator->fails()) {
            return new FormatApi(false, 'Validasi gagal', $validator->errors()->all());
        }

        $agama->update([
            'nama_agama' => $request->nama_agama,
        ]);

        return new FormatApi(true, 'Berhasil mengubah data agama', null);
    }

    public function deleteAgama39(Request $request, $id)
    {
        $agama = Agama39::find($id);

        if (!$agama) {
            return new FormatApi(false, 'Agama tidak ditemukan', null);
        }

        $agama->delete();

        return new FormatApi(true, 'Berhasil menghapus data agama', null);
    }
}
