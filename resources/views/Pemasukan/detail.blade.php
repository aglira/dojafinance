@extends('layout.app')
@section('content')
<div class="row ">
    <div class="row">
        <div class="col">
            <a href="/pemasukan" class="btn btn-success m-3"><i class="bi-arrow-left-circle me-2"></i>Kembali</a>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                Detail Pemasukan
            </div>
                <div class="list-group">
                    <div class="list-group-item">
                        <h5 class="mb-1">ID Pemasukan</h5>
                        <p class="mb-1">{{ $pemasukan->id_pemasukan }}</p>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">Nama Anggota</h5>
                        <p class="mb-1">{{ $pemasukan->nama_anggota }}</p>
                    </div>
                    <div class="list-group-item">
                        <h5 class="mb-1">Tanggal pemasukan</h5>
                        <p class="mb-1">{{ $pemasukan->tanggal_pemasukan }}</p>
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
