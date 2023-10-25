@extends('layout.app')
@section('title','Tambah Anggota ')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Tambah Data Anggota 
                </span>
            </div>
            @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
            <div class="card-body">
                <form method="POST" action="/data_anggota/tambah" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" id="user" />
                            </div>
                            <div class="form-group">
                                <label>Nama Anggota</label>
                                <input type="text" class="form-control" name="nama_anggota" />
                            </div>
                            <div class="form-group">
                                <label>Tinggi Badan</label>
                                <input type="number" class="form-control" name="tinggi_badan" />
                            </div>
                            <div class="form-group">
                                <label>Berat Badan</label>
                                <input type="number" class="form-control" name="berat_badan" />
                            </div>
                            <div class="form-group">
                                <label>Prestasi</label>
                                <textarea type="text" class="form-control" name="prestasi" ></textarea>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control" name="foto" />
                                @csrf
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">SIMPAN</button>
                                </div>
                                <p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

<script type="module">
    $(document).ready(function() {
        $('.DataTable').DataTable();
    });
</script>