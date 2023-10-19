<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $data = [
            'pemasukan' => Pemasukan::all()
        ];

        return view('pemasukan.index', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pemasukan' => ['required', 'max:40']
        ]);

        if ($data) {
            if ($request->input('id') !== null) {
                // TODO: Update Pemasukan
                $pemasukan = Pemasukan::query()->find($request->input('id'));
                $pemasukan->fill($data);
                $pemasukan->save();

                return response()->json([
                    'message' => 'Pemasukan berhasil diupdate!'
                ], 200);
            }

            $dataInsert = Pemasukan::create($data);
            if ($dataInsert) {
                return redirect()->to('/pemasukan')->with('success', 'pemasukan berhasil ditambah');
            }
        }

        return redirect()->to('/pemasukan')->with('error', 'Gagal tambah data');
    }

    public function delete(int $id): JsonResponse
    {
        $pemasukan = Pemasukan::query()->find($id)->delete();

        if ($pemasukan):
            //Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan' => 'Data user berhasil dihapus'
            ];
        else:
            //Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan' => 'Data gagal dihapus'
            ];
        endif;
        return response()->json($pesan);
    }
}
