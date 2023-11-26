@extends('layout.app')
@section('title', 'Pemasukan')
@section('content')
    {{-- <div class="" style=""> --}}
        {{-- <div class="col" style="margin-left:900px"> --}}
            <div class="row">
                <div class="col"  style="margin-left:1000px">
                    <a class="btn btn-primary me-1" style="margin-bottom: 10px;" href="{{ url('/dashboard') }}">
                        Kembali</a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#tambahmasuk-modal">Tambah</button>
                </div>
            </div>
        {{-- </div> --}}
            {{-- <div class="col"> --}}
                {{-- modaltambah --}}
                <div class="modal fade" id="tambahmasuk-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pemasukan</h1>
                            </div>
                            <div class="modal-body">
                                <form id="tambahmasuk-form" method="post" enctype="multipart/form-data"
                                    action="{{ url('pemasukan', ['tambah']) }}">
                                    <div class="form-group">
                                        {{-- @auth
                                       <input type="hidden" name="id_user" class="d-none"
                                              value="{{ Auth::user()["id"] }}">
                                    @endauth --}}
                                        <label>Id Pemasukan</label>
                                        <input type="text" name="id_pemasukan" id="IdAnggota" class="form-control mb-3">
                                        <label>Id Anggota</label>
                                        <input type="text" name="id_anggota" id="IdAnggota" class="form-control mb-3">
                                        <label>Id Tagihan</label>
                                        <input type="text" name="id_tagihan" id="IdTagihan" class="form-control mb-3">
                                        <label>Tanggal Pemasukan</label>
                                        <input type="date" name="tanggal_pemasukan" id="tanggalMasuk"
                                            class="form-control mb-3">
                                        <label>Nominal</label>
                                        <input type="number" name="nominal" id="jumlahMasuk" class="form-control mb-3">
                                        {{-- <label class="d-block"></label>
                                    <div class="row d-flex align-items-center">
                                    <button type="submit">send</button>
                                        <div class="col-3">
                                             <label for="fileUpload"
                                                  class="btn p-1 w-100 btn-outline-success form-control">Upload</label>
                                           <input type="file" accept=".pdf" name="file" id="fileUpload" class="d-none">
                                        </div>
                                    </div>  --}}
                                        @csrf
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="clearText()"
                                    data-bs-dismiss="modal">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary" form="tambahmasuk-form">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row"> --}}
                {{-- <div class="card" style="left: 200px"> --}}
                {{-- <div class="card-body ml-3"> --}}
                <table class="table table-bordered table-hovered DataTable ml-3" style="width: 72vw; left: 35px">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID anggota</th>
                            <th>ID tagihan</th>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        ?>
                    </tbody>
                    @if (count($pemasukan) > 0)
                        @foreach ($pemasukan as $ps)
                            <tr idPemasukan="{{ $ps->id_anggota }}">
                                <td class="col-1">{{ $no++ }}</td>
                                <td class="col-4">{{ $ps->id_anggota }}</td>
                                <td class="col-4">{{ $ps->id_tagihan }}</td>
                                <td class="col-1">{{ $ps->tanggal_pemasukan }}</td>
                                <td class="col-2">{{ $ps->nominal }}</td>
                                <td col-2>
                                    <button type="button" class="editBtn btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit-modal-{{ $ps->id_anggota }}" idPemasukan="{{ $ps->id_anggota }}">
                                        Edit
                                    </button>
                                    <button id="deleteBtn" type="button" class="hapusBtn btn btn-danger"
                                        idPemasukan="{{ $ps->id_anggota }}">Hapus</button>
                                </td>
                            </tr>

                            <div class="modal fade" id="edit-modal-{{ $ps->id_anggota }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pemasukan</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form id="edit-pemasukan-form-{{ $ps->id }}"
                                                enctype="multipart/form-data">
                                                <div class="form-group">
                                                    {{-- @auth
                                                       <input type="hidden" name="id_user" class="d-none"
                                                              value="{{ Auth::user()["id"] }}">
                                                              <td class="col-1">{{$no++}}</td>
                                                   @endauth --}}
                                                    <label>Id Pemasukan</label>
                                                    <input type="text" name="id_pemasukan" id="IdAnggota"
                                                        class="form-control mb-3" value="{{ $ps->id }}" disabled>
                                                    <label>Id Anggota</label>
                                                    <input type="text" name="id_anggota" id="IdAnggota"
                                                        class="form-control mb-3" value="{{ $ps->id_anggota }}">
                                                    <label>Id Tagihan</label>
                                                    <input type="text" name="id_tagihan" id="IdTagihan"
                                                        class="form-control mb-3" value="{{ $ps->id_tagihan }}">
                                                    <label>Tanggal Pemasukan</label>
                                                    <input type="date" name="tanggal_pemasukan" id="tanggalMasuk"
                                                        class="form-control mb-3" value="{{ $ps->tanggal_pemasukan }}">
                                                    <label>Nominal</label>
                                                    <input type="number" name="nominal" id="jumlahMasuk"
                                                        class="form-control mb-3" value="{{ $ps->nominal }}">
                                                    <label class="d-block"></label>
                                                    <div class="row d-flex align-items-center">
                                                        {{-- <button type="submit">send</button> --}}
                                                        <div class="col-3">
                                                            @csrf
                                                        </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" onclick="clearText()"
                                                data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary edit-btn"
                                                form=
                                                   "edit-pemasukan-form-{{ $ps->id }}">
                                                Edit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </table>
                {{-- </div> --}}
                {{-- </div> --}}
                {{-- </div> --}}
            {{-- </div> --}}
    {{-- </div> --}}
@endsection
@section('footer')
    <script type="module">
        // import swal from 'sweetalert2';

        $('.table').DataTable();
        $('#tambahmasuk-form').on('submit', function(e) {
            e.preventDefault();
            let data = new FormData(e.target);
            console.log(Object.fromEntries(data))
            axios.post('/pemasukan/tambah', data, {
                    'Content-Type': 'multipart/form-data'
                })
                .then(() => {
                    $('#tambahmasuk-modal').css('display', 'none')
                    swal.fire('Berhasil tambah data!', '', 'success').then(function() {
                        location.reload();
                    })
                })
                .catch(({
                    response
                }) => {
                    swal.fire('Gagal tambah data!',
                        `<strong class="text-danger">${response.data.message}</strong>`,
                        'warning');
                });
        })

        //hapus ON PROGRESS
        $('.hapusBtn').on('click', function() {
            let idPemasukan = $(this).closest('tr').attr('idPemasukan');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'
            }).then((result) => {
                if (result.isConfirmed) {
                    //dilakukan proses hapus
                    axios.delete(`/pemasukan/${idPemasukan}/delete`)
                        .then(function(response) {
                            if (response.data.success) {
                                swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                    // Hapus baris tabel
                                    $(`tr[idPemasukan=${idPemasukan}]`).remove();
                                });
                            } else {
                                swal.fire('Gagal di hapus!', '', 'warning');
                            }
                        }).catch(function() {
                            swal.fire('Data gagal di hapus!', '', 'error');
                        });
                }
            });
        })


        ///edit NOT YET
        $('.editBtn').on('click', function(e) {
            e.preventDefault();
            let idPemasukan = $(this).attr('idPemasukan');
            $(`#edit-pemasukan-form-${idPemasukan}`).on('submit', function(e) {
                e.preventDefault();
                let data = new FormData(this);
                // console.log(Object.fromEntries(data));
                axios.post(`/pemasukan/${idPemasukan}/edit`, data)
                    .then(() => {
                        $(`#edit-modal-${idPemasukan}`).css('display', 'none')
                        swal.fire('Berhasil edit data!', '', 'success').then(function() {
                            location.reload();
                        })
                    })
                    .catch(({
                        response
                    }) => {
                        // console.log(err)
                        let message = '';

                        Object.values(response.data.errors).flat().map((e) =>
                            message += `<strong class="text-danger d-block">${e}</strong>`
                        );

                        swal.fire('Gagal tambah data!', `${message}`, 'warning');
                    })
            })
        })
    </script>
@endsection
