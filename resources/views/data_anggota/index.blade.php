@extends('layout.app')
@section('title','Data Anggota')
@section('content')
<div class="container" style=" margin-top:100px;">
    <div class="row justify-content-center ">
        <div class="col-md">
            <a class="btn btn-primary me-1" href="{{url('/dashboard')}}">
                Kembali</a>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                data-bs-target="#tambahkeluar-modal">Tambah</button>

            {{-- modaltambah --}}
            <div class="modal fade" id="tambahkeluar-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Anggota</h1>
                        </div>
                        <div class="modal-body">
                            <form id="tambahkeluar-form" enctype="multipart/form-data">
                                <div class="form-group">
                                    {{-- @auth
                                       <input type="hidden" name="id_user" class="d-none"
                                              value="{{ Auth::user()["id"] }}">
                                    @endauth --}}
                                    <label>Username</label>
                                    <input type="text" name="username"
                                    class="form-control mb-3">
                                    <label>Nama Anggota</label>
                                    <input type="text" name="nama_anggota"
                                    class="form-control mb-3">
                                    <label>Tinggi Badan</label>
                                    <input type="number" name="tinggi_badan"
                                        class="form-control mb-3">
                                    <label>Berat Badan</label>
                                    <input type="number" name="berat_badan"
                                        class="form-control mb-3">
                                    <label>Prestasi</label>
                                    <input type="text" name="prestasi"
                                        class="form-control mb-3">
                                    <label class="d-block">Foto : </label>
                                    <input type="file" name="foto" id="foto">
                                        {{-- <div class="row d-flex align-items-center">
                                            <div class="col-3">
                                                <label for="fileUpload"
                                                       class="btn p-1 w-100 btn-outline-success form-control">Upload
                                                    Foto</label>
                                                <input type="file" accept=".png, .jpg, .jpeg" name="foto" class="d-none">
                                            </div>
                                            <div class="col p-0">
                                                <p class="fileName m-0 d-inline-block"></p>
                                            </div>
                                        </div> --}}
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


            <div class="card mt-2">
                <div class="card-body">
                    <table class="table table-bordered table-hovered DataTable" style="width: 72vw">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Anggota</th>
                                <th>Tinggi Badan</th>
                                <th>Berat Badan</th>
                                <th>Prestasi</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   
                            $no = 1;
                        ?>
                        </tbody>
                            @foreach($data_anggota as $d)
                            <tr idDataAnggota="{{$d->id_anggota}}">
                                <td class="col-1">{{$no++}}</td>
                                {{-- <td class="col-1">{{$d->nama_anggota->jenis_pengeluaran}}</td> --}}
                                <td class="col-1">{{ $d->nama_anggota }}</td>
                                <td class="col-2">{{$d->tinggi_badan}}</td>
                                <td class="col-1">{{$d->berat_badan}}</td>
                                <td class="col-1">{{$d->prestasi}}</td>
                                <td class="col-1">
                                    <div class="w-100 d-flex flex-column">
                                        @if($d->file)
                                            <a class="btn btn-primary mb-1"
                                               href="{{url("pengeluaran?path=$d->file", ['download'])}}">Download</a>
                                            <a class="btn btn-danger del-file" title="Delete file" idDataAnggota="{{$d->id_anggota}}">
                                                <i class="bi bi-trash3"></i>File</a>
                                        @else
                                            <p>No File</p>
                                        @endif

                                    </div>
                                </td>
                                <td col-2>
                                    <button type="button" class="editBtn btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#edit-modal-{{$d->id_anggota}}" idDataAnggota="{{$d->id_anggota}}">
                                        Edit
                                    </button>
                                    <button class="hapusBtn btn btn-danger">Hapus</button>
                                </td>
                            </tr>

                            <div class="modal fade" id="edit-modal-{{$d->id_anggota}}" tabindex="-1"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                               <div class="modal-dialog modal-dialog-centered">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                       </div>
                                       <div class="modal-body">
                                           <form id="edit-data-anggota-form-{{$d->id_anggota}}" enctype="multipart/form-data">
                                               <div class="form-group">
                                                   {{-- @auth
                                                       <input type="hidden" name="id_user" class="d-none"
                                                              value="{{ Auth::user()["id"] }}">
                                                   @endauth --}}
                                                   <label>Username</label>
                                                   <input type="text" name="username"
                                                       class="form-control mb-3" value="{{$d->username}}">
                                                   <label>Nama Anggota</label>
                                                   <input type="text" name="nama_anggota"
                                                       class="form-control mb-3" value="{{$d->nama_anggota}}">
                                                   <label>Tinggi Badan</label>
                                                   <input type="number" name="tinggi_badan"
                                                       class="form-control mb-3" value="{{$d->tinggi_badan}}">
                                                   <label>Berat Badan</label>
                                                   <input type="number" name="berat_badan"
                                                       class="form-control mb-3" value="{{$d->berat_badan}}">
                                                   <label>Prestasi</label>
                                                   <input type="text" name="prestasi"
                                                       class="form-control mb-3" value="{{$d->prestasi}}">
                                                   <label class="d-block">Foto : </label>
                                                       <div class="row d-flex align-items-center">
                                                           <div class="col-3">
                                                               <label for="fileUpload"
                                                                      class="btn p-1 w-100 btn-outline-success form-control">Upload Foto</label>
                                                               <input type="file" id="fileUpload" accept=".png, .jpg, .jpeg" name="foto" class="d-none">
                                                           </div>
                                                           <div class="col p-0">
                                                               <p class="fileName m-0 d-inline-block"></p>
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
                                           <button type="submit" class="btn btn-primary edit-btn"
                                                   form=
                                                   "edit-data-anggota-form-{{$d->id_anggota}}">
                                               Edit
                                           </button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('footer')
    <script>
        function clearText() {
            $(`.fileName`).text('');
            $('#fileUpload').val('');
        }
    </script>
    <script type="module">
        $('.table').DataTable();
        $('input[type=file]').on('change', function () {
            const fileName = $(this).val().replace(/.*(\/|\\)/, '');
            $(`.fileName`).text(fileName);
        })

    $('#tambahkeluar-form').on('submit', function (e) {
            e.preventDefault();
            let data = new FormData(e.target);
            console.log(Object.fromEntries(data))
            axios.post('/dataAnggota/tambah', data, {
                'Content-Type': 'multipart/form-data'
            })
                .then(() => {
                    $('#tambahdataAnggota-modal').css('display', 'none')
                    swal.fire('Berhasil tambah data!', '', 'success').then(function () {
                        location.reload();
                    })
                })
                .catch(({response}) => {
                    console.log(response);
                    swal.fire('Gagal tambah data!',
                        'warning');
                });
        })

        //hapus
        $('.table').on('click', '.hapusBtn', function () {
            let idDataAnggota = $(this).closest('tr').attr('idDataAnggota');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'
            }).then((result) => {
                if (result.isConfirmed) {
                    //dilakukan proses hapus
                    axios.delete(`/dataAnggota/${idDataAnggota}/hapus`)
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
                        }).catch(function ({response}) {
                            console.log(response);
                        // swal.fire('Data gagal di hapus!', '', 'error').then(function () {
                        //     //Refresh Halaman
                        //     location.reload();
                        // });
                    });
                }
            });
        })


        ///edit
        $('.editBtn').on('click', function (e) {
            e.preventDefault();
            let idDataAnggota = $(this).attr('idDataAnggota');
            console.log(idDataAnggota);
            $(`#edit-data-anggota-form-${idDataAnggota}`).on('submit', function (e) {
                e.preventDefault();
                let data = new FormData(e.target);
                console.log(Object.fromEntries(data));
                axios.post(`/dataAnggota/${idDataAnggota}/edit`, data)
                    .then(() => {
                        $(`#edit-modal-${idDataAnggota}`).css('display', 'none')
                        swal.fire('Berhasil edit data!', '', 'success').then(function () {
                            location.reload();
                        })
                    })
                    .catch(({response}) => {
                        // console.log(err)
                        let message = '';

                        console.log(response);

                        // Object.values(response.data.errors).flat().map((e) =>
                        //     message += `<strong class="text-danger d-block">${e}</strong>`
                        // );

                        swal.fire('Gagal tambah data!', `${message}`, 'warning');
                    })
            })
        })




        // $('.table').on('click', '.hapusBtn', function () {
        //     let idPemasukan = $(this).closest('tr').attr('idPemasukan');
        //     swal.fire({
        //         title: "Apakah anda ingin menghapus data ini?",
        //         showCancelButton: true,
        //         confirmButtonText: 'Gas',
        //         cancelButtonText: 'gajadi',
        //         confirmButtonColor: 'red'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             //dilakukan proses hapus
        //             axios.delete(`/pemasukan/${idPemasukan}`)
        //                 .then(function (response) {
        //                     console.log(response);
        //                     if (response.data.success) {
        //                         swal.fire('Berhasil di hapus!', '', 'success').then(function () {
        //                             //Refresh Halaman
        //                             location.reload();
        //                         });
        //                     } else {
        //                         swal.fire('Gagal di hapus!', '', 'warning');
        //                     }
        //                 }).catch(function (error) {
        //                 swal.fire('Data gagal di hapus!', '', 'error').then(function () {
        //                     //Refresh Halaman
        //                     location.reload();
        //                 });
        //             });
        //         }
        //     });
        // })

</script>
    @endsection