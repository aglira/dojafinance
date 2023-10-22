<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    //
    public function index(){
        //Menampilkan list pemasukan
        $data = [
            'pemasukan' => Pemasukan::all()
        ];
        return view('pemasukan.index',$data);
    }
    public function tambah(){
        return view('pemasukan.tambah');
    }
    //Methods for tambah dan edit 
    public function simpan(Request $request){
        $validate = $request->validate([
            'Nama Anggota'   => ['required'],
            'Tanggal'   => ['required'],
            'Nominal'        => ['required'],
        ]);
        
        //Check Validasi
        if($validate):
            if($request->input('id_pemasukan') !== null):
                //Update
                $dataUpdate = Pemasukan::where('id_pemasukan',$request->input('id_pemasukan'))
                                ->update($validate);
                if($dataUpdate):
                    return redirect('/dashboard/pemasukan')->with('success','Data pemasukan berhasil diupdate');
                else:
                    return redirect('/dashboard/tambah')->with('error','Data pemasukan Gagal diupdate');
                endif;
            else:
                //Insert
                $validate['id_pemasukan'] = 1;
                $dataInsert = Pemasukan::create($validate);
                if($dataInsert):
                    return redirect('/dashboard/pemasukan')->with('success','Data pemasukan berhasil ditambah');
                else:
                   return redirect('/dashboard/tambah')->with('error','Data pemasukan Gagal ditambah');
                endif;

            endif;
        endif;
    }
    public function details(Request $request){
        //Get Id
        $data = [
         'pemasukan' =>   Pemasukan::where('id_pemasukan',$request->id)
                        ->first()
        ];
        return view('pemasukan.detail',$data);
    }
    public function hapus(Pemasukan $pemasukan, Request $request){
        $id_pemasukan = $request->id;
        //Hapus 
        $aksi = $pemasukan->where('id_pemasukan',$id_pemasukan)->delete();
        if($aksi):
            //Pesan Berhasil
            $pesan = [
                'success'   => true,
                'pesan'     => 'Data pemasukan berhasil dihapus'
            ];
        else:
            //Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'     => 'Data gagal dihapus'
            ];
        endif;
        return response()->json($pesan);
    }
}
