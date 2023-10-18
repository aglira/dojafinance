@extends('layout.app')
@section('title', 'Pemasukan')
@section('content')
<div class=" mt-3">
    <table class="table table-hovered table-bordered DataTable  ">
        <thead>
            <tr style="text-align: center; font-size: 17px; font-weight: 400;">
                <td>No</td>
                <td>Nama</td>
                <td>Tanggal</td>
                <td>Nominal</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no = 1;
            ?>

            <tr style="vertical-align: middle; font-size: 17px;">
                <td class="col-1" style="text-align: center;"> {{$no++}} </td>
                <td class="col-3">Aglira</td>
                <td class="col-2" style="text-align: center">28062023</td>
                <td class="col-2" style="text-align: center">50000</td>
                <td class="col-2" style="text-align: center">
                    {{-- <a href="#" class="text-decoration-none">
                        <btn class="btn btn-primary">Edit</btn>
                    </a>

                    <a href="#" class="text-decoration-none">
                        <btn class="btn btn-success">Detail</btn>
                    </a>

                    <btn class="hapusBtn btn btn-danger">Hapus</btn> --}}

                    <div class="dropdown dropend" style="display: inline-block; vertical-align: middle;">
                        <button class="btn btn-primary" id="navbarDropdownMenuLink" data-bs-toggle='dropdown' data-bs-offset="-10,20">
                            Action
                            <i  class="bi bi-three-dots-vertical " 
                                style="font-size: 26; vertical-align: middle; cursor: pointer;">
                            </i>
                        </button>

                        <div class="dropdown-menu" style="width: 100px;" aria-labelledby="navbarDropdownMenuLink">
                        
                        <h6 class="dropdown-header">Apa Yang Akan Anda Lakukan?</h6>
                           <a class="dropdown-item" href="#"> 
                            <i class="bi bi-eye"  style="font-size: 20px; vertical-align: middle; "></i> 
                            <strong class="ms-1">Lihat Detail</strong> 
                           </a>

                           <a class="dropdown-item" href="#"> 
                            <i class="bi bi-pencil"  style="font-size: 20px; vertical-align: middle; "></i> 
                            <strong class="ms-1" >Edit Data</strong> 
                           </a>

                           <a class="dropdown-item" href="#"> 
                            <i class="bi bi-trash"  style="font-size: 20px; vertical-align: middle; "></i> 
                            <strong class="ms-1">Hapus Data</strong> 
                           </a>

                        </div>

                    </div>

                </td>
            </tr>
        </tbody>
    </table>
</div>