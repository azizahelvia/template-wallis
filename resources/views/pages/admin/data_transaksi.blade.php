@extends('layouts.app')

<?php 
    $page = "Data Transaksi";
?>

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>

        <!-- Table Data Transaction -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Invoice ID</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Azizah Elvia</td>
                                <td>#INV_40282848</td>
                                <td>LUNAS</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm mr-2" data-toggle="modal" 
                                    data-target="#detail" title="Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog ">
                                            <div class="modal-content p-3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <h5 class="text-dark">Nama User: Azizah Elvia</h5>
                                                    <p class="text-dark">Status: LUNAS</p>
                                                </div>

                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Pesanan</th>
                                                            <th>Jumlah</th>
                                                            <th>Harga</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                                <td>Nasi Goreng</td>
                                                                <td>2</td>
                                                                <td>Rp 15000</td>
                                                                <td>Rp 30000</td>
                                                            </tr>
                                                    </tbody>
                                                </table>

                                                <p>Total Harga: Rp 30000</p>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal Detail -->

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" 
                                    data-target="#delete" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Transaksi</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda ingin Menghapus Transaksi?</p>
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
@endsection