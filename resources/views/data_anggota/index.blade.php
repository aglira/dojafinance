@extends('layout.app')
@section('title', 'Data Anggota')
@section('content')
    <div class="row">
        
        <div class="card">
            <h1>Data Anggota</h1>
            <div class="row">
                <div class="col">
                    <div class="input-group col-md-4" style="max-width: 300px; border-right: none;">
                        <input  class="form-control py-2 border-right-0 border" type="search" placeholder="search" id="example-search-input">
                        <span class="input-group-append">
                            <div style="border-left: none;" class="input-group-text py-2 border-left-0 bg-transparent"><i class="bi-search"></i></div>
                        </span>
                    </div>
                </div>
                <div class="col float-end text-end ml-5">
                    <a href="{{ url('data_anggota',['tambah']) }}" class="btn btn-success">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table  table-bordered DataTable">
                    <thead>
                        <tr>
                          <th scope="col-1">No</th>
                          <th scope="col-1">Nama Anggota</th>
                          <th scope="col-2">Prestasi</th>
                          <th scope="col-3">Foto</th>
                          <th scope="col-3">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $x=1; ?>
                        @foreach ($data_anggota as $d)
                        <tr>
                          <th scope="row">{{ $x++ }}</th>
                          <td>{{ $d->nama_anggota }}</td>
                          {{-- <td>{{ $d->tinggi_badan }}</td>
                          <td>{{ $d->berat_badan }}</td> --}}
                          <td>{{ $d->prestasi }}</td>
                          <td>{{ $d->foto }}</td>
                          <td>
                            <a href="{{ url('data_anggota',['edit']) }}">
                                <btn class="btn btn-primary">Edit</btn>
                            </a>
                            <a href="{{ url('data_anggota.detail') }}">
                                <btn class="btn btn-warning">Detail</btn>
                            </a>
                            <btn class="hapusBtn btn btn-danger">Hapus</btn>
                        </td>
                    </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>
    </div>
</div>
@endsection

<script type="module">
    $(document).ready(function() {
        $('.DataTable').DataTable();
    });
</script>

<script type="module">
    $(document).on('click', '.hapusBtn', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        Swal({
            title: "Are you sure you want to delete this row?",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        })
        .then((result) => {
            if (result.value) {
                // Delete the row
            } else {
                // Do nothing
            }
        });
    });
</script>

{{-- @section('footer')
<script type="module">
    $(document).on('click', '.hapusButton', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    Swal({
            title: "Are you sure?",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        })        
            });

</script>
@endsection