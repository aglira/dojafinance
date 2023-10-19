@extends('layout.app')
@section('content')
<div class="row">
    <div class="col">
        <a href="/pemasukan" class="btn btn-primary m-2"><i class="bi-arrow-left-circle me-2"></i>Kembali</a>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card mb-4">
            <div class="card-header">
                <h3>Tambah Pemasukan</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('pemasukan',['simpan']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group col">
                    <label for="tanggal">Tanggal</label>
                    <input id="tanggal" type="date" class="form-control" name="tanggal_pemasukan">
                </div>
                <div class="form-group col">
                    <label for="nama_anggota">Nama Anggota</label>
                    <input id="nama_anggota" type="text" class="form-control" name="nama_anggota">
                </div>
                <div class="form-group col">
                    <label for="nominal">Nominal</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="nominal" aria-label="Amount" name="nominal">
                        <span class="input-group-text">,00</span>
                    </div>
                </div>
                <div class="form-group col">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
                
            </div>
        </div>
    </div>
</div>
@endsection