@extends('layout.app')
@section('title','Pengeluaran')
@section('content')
<div class="container" style="margin-left: -200px; margin-top:100px; width: 100vw;">
    <div class="row justify-content-center ">
        <div class="col-md">
            <div class="row">
                <div class="col" style="margin-left: 1200px">
            <a class="btn btn-primary me-1" href="{{url('/dashboard')}}" >
                Kembali</a>
            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#tambahkeluar-modal" style="right: 200px">Tambah</button>
                </div>
            </div>

            {{-- modaltambah --}}
            <div class="modal fade" id="tambahkeluar-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pengeluaran</h1>
                        </div>
                        <div class="modal-body">
                            <form id="tambahkeluar-form" method="post" enctype="multipart/form-data" action="{{ url('pengeluaran',['tambah']) }}">
                                <div class="form-group">
                                    {{-- @auth
                                       <input type="hidden" name="id_user" class="d-none"
                                              value="{{ Auth::user()["id"] }}">
                                    @endauth --}}
                                    <label>Id Pengeluaran</label>
                                    <input type="text" name="id_pengeluaran" id="IdPengeluaran"
                                        class="form-control mb-3" >
                                    <label>Username</label>
                                    <input type="text" name="username" id="username"
                                        class="form-control mb-3" >
                                    <label>Id Jenis Pengeluaran</label>
                                    <input type="text" name="id_jenis_pengeluaran" id="IdJenisPengeluaran"
                                        class="form-control mb-3" >
                                    <label>Nominal</label>
                                    <input type="number" name="nominal" id="jumlahKeluar"
                                        class="form-control mb-3">
                                    <label>Tanggal Pengeluaran</label>
                                    <input type="datetime-local" name="tanggal" id="tanggalKeluar"
                                        class="form-control mb-3">
                                    <label class="d-block"></label>
                                    <div class="row d-flex align-items-center">
                                    <button type="submit">send</button>
                                        <div class="col-3">
                                            {{-- <label for="fileUpload"
                                                  class="btn p-1 w-100 btn-outline-success form-control">Upload</label>
                                           <input type="file" accept=".pdf" name="file" id="fileUpload" class="d-none"> --}}
                                        </div>
                                    </div>
                                    @csrf
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="clearText()"
                                data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-primary" form="tambahkeluar-form">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">

                </div>
            <div class="card" style="left: 200px">
                <div class="card-body ml-3">
                    <table class="table table-bordered table-hovered DataTable ml-3" style="width: 72vw; left: 35px">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>ID pengeluaran</th>
                                <th>Username</th>
                                <th>Id jenis pengeluaran</th>
                                <th>Nominal</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   
                            $no = 1;
                        ?>
                            @foreach($pengeluaran as $pnlr)
                            <tr idPengeluaran="{{$pnlr->id}}">
                                <td class="col-1">{{$no++}}</td>
                                <td class="col-4">{{$pnlr->username}}</td>
                                <td class="col-1">{{$pnlr->id_jenis_pengeluaran}}</td>
                                <td class="col-2">{{$pnlr->nominal}}</td>
                                <td class="col-2">{{$pnlr->tanggal}}</td>
                                <td col-2>
                                    <button type="button" class="editBtn btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit-modal-{{$pnlr->id}}" idPengeluaran="{{$pnlr->id}}">
                                        Edit
                                    </button>
                                    <button class="hapusBtn btn btn-danger">Hapus</button>
                                </td>
                            </tr>

                            <div class="modal fade" id="edit-modal-{{$pnlr->id}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                               <div class="modal-dialog modal-dialog-centered">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pengeluaran</h1>
                                       </div>
                                       <div class="modal-body">
                                           <form id="edit-pengeluaran-form-{{$pnlr->id}}" enctype="multipart/form-data">
                                               <div class="form-group">
                                                   {{-- @auth
                                                       <input type="hidden" name="id_user" class="d-none"
                                                              value="{{ Auth::user()["id"] }}">
                                                   @endauth --}}
                                                    <label>Id Pengeluaran</label>
                                                    <input type="text" name="id_pengeluaran" id="IdPengeluaran"
                                                        class="form-control mb-3" >
                                                    <label>Username</label>
                                                    <input type="text" name="username" id="username"
                                                        class="form-control mb-3" >
                                                    <label>Id Jenis Pengeluaran</label>
                                                    <input type="text" name="id_jenis_pengeluaran" id="IdJenisPengeluaran"
                                                        class="form-control mb-3" >
                                                    <label>Nominal</label>
                                                    <input type="number" name="nominal" id="jumlahKeluar"
                                                        class="form-control mb-3">
                                                    <label>Tanggal Pengeluaran</label>
                                                    <input type="datetime-local" name="tanggal" id="tanggalKeluar"
                                                        class="form-control mb-3">
                                                    <label class="d-block"></label>
                                                    <div class="row d-flex align-items-center">
                                                    <button type="submit">send</button>
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
                                                   "edit-pengeluaran-form-{{$pnlr->id}}">
                                               Edit
                                           </button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
    @endsection
    @section('footer')
    <script type="module">
        $('.table').DataTable();
    $('#tambahkeluar-form').on('submit', function (e) {
            e.preventDefault();
            let data = new FormData(e.target);
            console.log(Object.fromEntries(data))
            axios.post('/pengeluaran/tambah', data, {
                'Content-Type': 'multipart/form-data'
            })
                .then(() => {
                    $('#tambahkeluar-modal').css('display', 'none')
                    swal.fire('Berhasil tambah data!', '', 'success').then(function () {
                        location.reload();
                    })
                })
                .catch(({response}) => {
                    swal.fire('Gagal tambah data!', `<strong class="text-danger">${response.data.message}</strong>`,
                        'warning');
                });
        })

        //hapus
        $('.table').on('click', '.hapusBtn', function () {
            let idPengeluaran = $(this).closest('tr').attr('idPengeluaran');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'
            }).then((result) => {
                if (result.isConfirmed) {
                    //dilakukan proses hapus
                    axios.delete(`/pengeluaran/${idPengeluaran}/hapus`)
                        .then(function (response) {
                            console.log(response);
                            if (response.data.success) {
                                swal.fire('Berhasil di hapus!', '', 'success').then(function () {
                                    //Refresh Halaman
                                    location.reload();
                                });
                            } else {
                                swal.fire('Gagal di hapus!', '', 'warning');
                            }
                        }).catch(function () {
                        swal.fire('Data gagal di hapus!', '', 'error').then(function () {
                            //Refresh Halaman
                            location.reload();
                        });
                    });
                }
            });
        })


        ///edit
        $('.editBtn').on('click', function (e) {
            e.preventDefault();
            let idPengeluaran = $(this).attr('idPengeluaran');
            $(`#edit-pengeluaran-form-${idPengeluaran}`).on('submit', function (e) {
                e.preventDefault();
                let data = new FormData(this);
                // console.log(Object.fromEntries(data));
                axios.post(`/pengeluaran/${idPengeluaran}/edit`, data)
                    .then(() => {
                        $(`#edit-modal-${idPengeluaran}`).css('display', 'none')
                        swal.fire('Berhasil edit data!', '', 'success').then(function () {
                            location.reload();
                        })
                    })
                    .catch(({response}) => {
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