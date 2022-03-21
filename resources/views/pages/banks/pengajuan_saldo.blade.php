@extends('layouts.app')

<?php
    $page = "Pengajuan Saldo"
?>

@section('content')
<div class="container-fluid">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengajuan Topup Saldo</h1>

    <!-- Table Saldo Submission -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan Topup Saldo</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($balances as $balance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $balance->user->name }}</td>
                                <td>@currency($balance->amount)</td>
                                <td>
                                    <a href="{{ route('topupbalance.approved', ["transaction_id" => $balance->id]) }}"
                                        class="btn btn-success btn-sm mr-2" title="Setuju">
                                        <i class="fa-solid fa-check"></i>
                                    </a>
                                    <input type="hidden" name="status" value="3">
                                    <a href="{{ route('topupbalance.rejected', ["transaction_id" => $balance->id]) }}"
                                        class="btn btn-danger btn-sm" title="Tolak">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                    <input type="hidden" name="status" value="">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
