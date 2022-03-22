@extends('layouts.app')

<?php
    $page = "Riwayat Transaksi Kantin";
?>

@section('content')
<div class="container-fluid">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Riwayat Transaksi Kantin</h1>

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
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shop_by_invoices as $shop_by_invoice)
                            @if ($shop_by_invoice->status == 1 || $shop_by_invoice->status == 2 || $shop_by_invoice->status == 3 || $shop_by_invoice->status == 4)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $shop_by_invoice->user->name }}</td>
                                    <td>{{ $shop_by_invoice->invoice_id }}</td>
                                    <td>
                                        @if ($shop_by_invoice->status == 1)
                                            BELUM BAYAR

                                        @elseif ($shop_by_invoice->status == 2)
                                            TUNGGGU KONFIRMASI

                                        @elseif ($shop_by_invoice->status == 3)
                                            SELESAI

                                        @else
                                            DITOLAK
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
