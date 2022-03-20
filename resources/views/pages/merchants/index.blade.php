@extends('layouts.app')

<?php 
    $page = "Kasir Kantin";
?>

@section('content')
    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kasir Kantin</h1>

    <!-- Table Saldo Submission -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kasir Kantin</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Invoice ID</th>
                            <th>status</th>
                            <th>Detail</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>1</td>
                                <td>Azizah Elvia</td>
                                <td>INV_2091838</td>
                                <td>Menunggu Konfirmasi</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" 
                                    data-target="#detail" title="Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog ">
                                            <div class="modal-content p-3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Pesanan #INV_493929292</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Menu</th>
                                                                <th>Jumlah</th>
                                                                <th>Harga</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                    <td>1.</td>
                                                                    <td>Nasi Goreng</td>
                                                                    <td>2</td>
                                                                    <td>Rp 15000</td>
                                                                    <td>Rp 30000</td>
                                                                </tr>
                                                        </tbody>
                                                    </table>
    
                                                    <p>Total Harga: Rp 30000</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal Detail -->
                                </td>
                                <td>
                                    <a href="#" class="btn btn-success mr-2" title="Terima">
                                        <i class="fa-solid fa-square-check"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger" title="Tolak">
                                        <i class="fa-solid fa-square-xmark"></i>
                                    </a>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection