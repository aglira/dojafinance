<?php

namespace App\Http\Controllers;

use App\Models\DataAnggota;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class DataAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'data_anggota' => DataAnggota::all()
        ];
        return view('data_anggota.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_anggota.tambah');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'username'   => ['required'],
            'tinggi_badan' => ['required'],
            'berat_badan' => ['required'],
            'prestasi' => ['required'],
            'foto' => ['required'],
        ]);
        //  dd($validate);
        // Check validasi
        if ($validate) {
            // Validasi berhasil
            if ($request->input('id_anggota') !== null) {
                // Update data
                $dataUpdate = DataAnggota::where('id_anggota', $request->input('id_anggota'))
                                        ->update($validate);
                if ($dataUpdate) {
                    return redirect('/dataAnggota')->with('success', 'Data anggota berhasil diupdate');
                } else {
                    return redirect('/dataAnggota/tambah')->with('error', 'Data anggota gagal diupdate');
                }
            } else {
                // Tambah data
                $dataAnggota = DataAnggota::create($validate);
                if ($dataAnggota) {
                    return redirect('/dataAnggota')->with('success', 'Data anggota baru berhasil disimpan');
                } else {
                    return redirect('/dataAnggota/tambah')->with('error', 'Data anggota baru gagal disimpan');
                }
            }
        } else {
            // Validasi gagal
            return redirect('/dataAnggota/tambah')->with('error', 'Data anggota gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DataAnggota $dataAnggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataAnggota $dataAnggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request){
        $data = $request->validate([
            'nama_anggota'   => ['required'],
            'tinggi_badan' => ['required'],
            'badan_badan' => ['required'],
            'prestasi' => ['required'],
            'foto' => 'mimes:png,jpg,jpeg,csv,txt,pdf',
        ]);
    
        $file = $request->file('foto');
        $oldfile = $request->file('oldfile');
        $filename = '';
    
        if($file){
            $filename = $file;
        }
        if($file !== $oldfile){
            $filename = time() . '_' . $file->getClientOriginalName();
        }
    
        $data['foto'] = $filename;
        $update = User::query()->find($request->id);
    
        if($oldfile){
            Storage::disk('public')->delete($oldfile);
        }
        
        if ($update->fill($data)->save()) {
            if($filename){
            $file->storePubliclyAs('', $filename, 'public');
        }
            return redirect()->to('/user')->with('success', "Data User berhasil diupdate");
        } else
            return redirect()->back()->with('error', "Data User gagal diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataAnggota $dataAnggota)
    {
        //
    }
}
