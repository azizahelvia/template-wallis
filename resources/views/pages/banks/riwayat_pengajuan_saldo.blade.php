@extends('layouts.app')

<?php
    $page = "Riwayat Pengajuan Saldo";
?>

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Riwayat Transaksi</h1>

    <!-- Table Submission Balance -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Pengajuan Saldo</h6>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> 
                Unduh Riwayat Pengajuan
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Invoice ID</th>
                            <th>Nominal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Azizah Elvia</td>
                            <td>29/03/2022</td>
                            <td>#BAL_40282848</td>
                            <td>Rp 50000</td>
                            <td>Disetujui</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Azizah Elvia</td>
                            <td>29/03/2022</td>
                            <td>#BAL_40282849</td>
                            <td>Rp 1000</td>
                            <td>Ditolak</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection