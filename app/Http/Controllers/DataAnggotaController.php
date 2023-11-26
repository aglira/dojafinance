<?php

namespace App\Http\Controllers;

use App\Models\DataAnggota;
use App\Models\User;
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
        // return view('data_anggota.tambah');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username'   => ['required'],
            'data_anggota'   => ['required'],
            'tinggi_badan' => ['required'],
            'berat_badan' => ['required'],
            'prestasi' => ['required'],
            'foto' => 'mimes:png,jpg,jpeg,csv,txt,pdf',
        ]);

        if($data){
            
        }
        // dd($validate);
        // Check validasi
    //     if ($data) {
    //         // Validasi berhasil
    //         if ($request->input('username') !== null) {
    //             // Update data
    //             $dataUpdate = DataAnggota::where('username', $request->input('username'))
    //                                     ->update($data);
    //             if ($dataUpdate) {
    //                 return redirect('/dataAnggota')->with('success', 'Data anggota berhasil diupdate');
    //             } else {
    //                 // dd($data);
    //                 return redirect('/dataAnggota/tambah')->with('error', 'Data anggota gagal diupdate');
    //             }
    //         } else {
    //             // Tambah data
    //             $data_anggota = DataAnggota::create($data);
    //             if ($data_anggota) {
    //                 return redirect('/dataAnggota')->with('success', 'Data anggota baru berhasil disimpan');
    //             } else {
    //                 return redirect('/dataAnggota/tambah')->with('error', 'Data anggota baru gagal disimpan');
    //             }
    //         }
    //     } else {
    //         // Validasi gagal
    //         return redirect('/dataAnggota/tambah')->with('error', 'Data anggota gagal disimpan');
    //     }
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