@extends('layout.app')
@section('content')
<div class="row ">
    <div class="row">
        <div class="col">
            <a href="/pemasukan" class="btn btn-primary m-3"><i class="bi-arrow-left-circle me-2"></i>Kembali</a>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                Detail Pemasukan
            </div>
            <div class="card-body">
                {{-- <div class="row">
                    <div class="col">
                        <ul>
                            <li>Tanggal Pembayaran</li>
                            <li>Metode Pembayaran</li>
                            <li>Nama Penerima</li>
                            <li>Nomor Rekening Penerima</li>
                            <li>Nominal</li>
                            <li>Bukti Pembayaran</li>
                            <li>Perihal</li>
                        </ul>
                    </div>
                    <div class="col">
                        hi
                    </div>
                </div> --}}
                    <div class="list-group-item">
                        <h5 class="mb-1">Tanggal Pembayaran</h5>
                        <p class="mb-1">{{ $pemasukan->tanggal_pemasukan }}</p>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">Nama Anggota</h5>
                        <p class="mb-1">{{ $pemasukan->nama_anggota }}</p>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">Nominal</h5>
                        <p class="mb-1">{{ $pemasukan->nominal }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection