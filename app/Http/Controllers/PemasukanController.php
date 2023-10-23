<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemasukanRequest;
use App\Http\Requests\PemasukanEditRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $data = [
            // 'pemasukan'=> Pemasukan::with('jenis')->orderByDesc('tanggal_pemasukan')->get(),
            'pemasukan'=> Pemasukan::all(),
        ];

        // return $data;

        return view('pemasukan.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $data = $request->validate([
                'id_pemasukan' => 'required',
                'id_anggota' => 'required',
                'id_tagihan' => 'required',
                'tanggal_pemasukan' => 'required',
                'nominal' => 'required'
            ]);
            
    
            $pemasukan = Pemasukan::query()->create($data);
    
            if (!$pemasukan) {
                // dd($data);
                return response()->json([
                    'message' => 'Failed create pemasukan'
                ], 403);
            }
    
            // return response()->json([
            //     'message' => 'Pemasukan created'
            // ], 201);

            return redirect()->to('pemasukan');
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

    /**
     * Update the specified resource in storage.
     */
    public function update(PemasukanEditRequest $request)
    {
        $data = $request->validated();
        $pemasukan = Pemasukan::query()->find($request->id);

       
        $pemasukan->fill($data)->save();

        return [
            'message' => 'Berhasil update surat!'
        ];
    }
    }
