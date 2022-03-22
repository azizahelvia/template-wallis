@extends('layouts.app')

<?php
    $page = "Riwayat Transaksi";
?>

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Riwayat Transaksi</h1>

    <!-- Table Transaction History -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Invoice ID</th>
                            <th>Jenis Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction_by_invoices as $transaction_by_invoice)
                            @if ($transaction_by_invoice->type == 1 || $transaction_by_invoice->type == 2)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction_by_invoice->user->name }}</td>
                                    <td>{{ $transaction_by_invoice->invoice_id }}</td>
                                    <td>{{ $transaction_by_invoice->type == 1 ? "TOPUP" : "BELANJA" }}</td>
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
