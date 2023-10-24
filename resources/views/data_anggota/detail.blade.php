@extends('layout.app')
@section('content')
<div class="row">
    <h3 class="judulform">Detail Data Anggota</h1>
</div>
<div class="card">
    <div class="card-header">
        Detail Data Anggota
    </div>
    <div class="card-body">
        <div class="list-group-item">
            <h5 class="mb-1">Id Anggota</h5>
            <p class="mb-1">{{ $d->id_anggota }}</p>
        </div>
        <div class="list-group-item">
            <h5 class="mb-1">Nama Anggota</h5>
            <p class="mb-1">{{ $d->nama_anggota }}</p>
        </div>
        <div class="list-group-item">
            <h5 class="mb-1">Tinggi Badan</h5>
            <p class="mb-1">{{ $d->tinggi_badan }}</p>
        </div>
        <div class="list-group-item">
            <h5 class="mb-1">Berat Badan</h5>
            <p class="mb-1">{{ $d->berat_badan }}</p>
        </div>
        {{-- <div class="list-group-item">
            <h5 class="mb-1">Gambar Kue</h5>
            {{ $d->gambar_anggota }}
            @if($d->gambar_kue)
            <img src="{{ Storage::url('public/' . $d->gambar_kue) }}" alt="">
            @else
            <p class="mb-1">null</p> --}}
            {{-- @endif --}}
        </div>
    </div>
</div>
@endsection