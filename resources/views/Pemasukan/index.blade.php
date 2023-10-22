@extends('layout.app')
@section('title','Pemasukan')
@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <span class="h2">Pemasukan DojaFinance</span>
            </div>
            <div class="card-body">
                <table class="table table-hovered table-bordered DataTable">
                    <thead>
                        <tr>
                            <th>
                                NO
                            </th>
                            <th>
                                Nama Anggota
                            </th>
                            <th>
                                Tanggal
                            </th>
                            <th>
                                Nominal
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                        ?>
                        @foreach($pemasukan as $p)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$p->nama_anggota}}</td>
                            <td>{{$p->tanggal}}</td>
                            <td>{{$p->pemasukan}}</td>
                            <td>{{$p->penanggung_jawab}}</td>

                            <td>
                                <a href="/pemasukan/detail/{{$p->id_pemasukan}}">
                                    <btn class="btn btn-primary">Detail</btn>
                                </a>
                                <btn class="hapusBtn btn btn-danger" idPemasukan="{{$p->id_pemasukan}}">Hapus</btn>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="{{ url('pemasukan',['tambah']) }}"><btn class="btn btn-success">Tambah</btn></a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script type="module">
$('.DataTable tbody').on('click','.hapusBtn',function(a){
    a.preventDefault();
    let idPemasukan= $(this).closest('.hapusBtn').attr('idPemasukan');
    swal.fire({
            title : "Apakah anda ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonText: 'Setuju',
            cancelButtonText: `Batal`,
            confirmButtonColor: 'red'

        }).then((result)=>{
            if(result.isConfirmed){
                //dilakukan proses hapus
                axios.delete('pemasukan/hapus/'+idPemasukan).then(function(response){
                    console.log(response);
                    if(response.data.success){
                        swal.fire('Berhasil di hapus!', '', 'success').then(function(){
                                //Refresh Halaman
                                location.reload();
                            });
                    }else{
                        swal.fire('Gagal di hapus!', '', 'warning').then(function(){
                                //Refresh Halaman
                                location.reload();
                            });
                    }
                }).catch(function(error){
                    swal.fire('Data gagal di hapus!', '', 'error').then(function(){
                                //Refresh Halaman
                               
                            });
                });
            }
        });
});
$('.DataTable').DataTable();
</script>
@endsection