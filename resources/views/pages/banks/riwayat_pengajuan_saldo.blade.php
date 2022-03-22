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
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Invoice ID</th>
                            <th>Nominal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topup_by_invoices as $topup_by_invoice)
                            @if ($topup_by_invoice->status == 3 || $topup_by_invoice->status == 4)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $topup_by_invoice->user->name }}</td>
                                    <td>{{ $topup_by_invoice->invoice_id }}</td>
                                    <td>{{ $topup_by_invoice->amount }}</td>
                                    <td>
                                        @if ($topup_by_invoice->status == 3)
                                            TELAH DITOPUP

                                            @elseif ($topup_by_invoice->status == 4)
                                                TOPUP DITOLAK
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
