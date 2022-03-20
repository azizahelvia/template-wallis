@extends('layouts.app')

<?php 
    $page = "Data Barang";
?>

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>

    <!-- Table Data Barang -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                data-toggle="modal" data-target="#addinventory">
                <i class="fas fa-plus fa-sm text-white-50"></i> 
                Tambah Barang
            </button>

            <!-- Modal Add Barang -->
            <div class="modal fade" id="addinventory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                        </div>
                        <form method="POST" action="#">
                            @csrf
                            <div class="modal-body">
                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of Modal Add Barang -->

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pensil 2B</td>
                            <td>Rp {{ number_format(2000, 0, ",", ".") }}</td>
                            <td>100</td>
                            <td>Pensil 2B buat ujian tertulis</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm mr-2" 
                                    data-toggle="modal" data-target="#edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                                            </div>
                                            <form method="POST" action="#">

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Modal Edit -->

                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" 
                                    data-target="#delete" title="Hapus">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah Anda ingin Menghapus Barang?</p>
                                            </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    <a type="submit" href="#" class="btn btn-danger">Hapus</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Modal Delete -->

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@endsection