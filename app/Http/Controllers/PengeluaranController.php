<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengeluaranRequest;
use App\Http\Requests\PengeluaranEditRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $data = [
            // 'pengeluaran'=> Pengeluaran::with('jenis')->orderByDesc('tanggal_pengeluaran')->get(),
            'pengeluaran'=> Pengeluaran::all(),
        ];
        // return $data;

        return view('pengeluaran.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $data = $request->validate([
                'id_pengeluaran' => 'required',
                'username' => 'required',
                'id_jenis_tagihan' => 'required',
                'nominal' => 'required',
                'tanggal_pengeluaran' => 'required',
                'disetujui' => 'required'
            ]);
            
    
            $pengeluaran = Pengeluaran::query()->create($data);
    
            if (!$pengeluaran) {
                // dd($data);
                return response()->json([
                    'message' => 'Failed create pengeluaran'
                ], 403);
            }
    
            // return response()->json([
            //     'message' => 'Pengeluaran created'
            // ], 201);

            return redirect()->to('pengeluaran');
        }
    public function delete(int $id): JsonResponse
    {
        $pengeluaran = Pengeluaran::query()->find($id)->delete();

        if ($pengeluaran):
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
    public function update(PengeluaranEditRequest $request)
    {
        $data = $request->validated();
        $pengeluaran = Pengeluaran::query()->find($request->id);

       
        $pengeluaran->fill($data)->save();

        return [
            'message' => 'Berhasil update surat!'
        ];
    }
    }