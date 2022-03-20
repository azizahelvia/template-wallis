@extends('layouts.app')

<?php 
    $page = "Pengajuan Saldo"
?>

@section('content')
<div class="container-fluid">

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
                        @foreach ($applybalance as $apply)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $apply->user->name }}</td>
                                <td>{{ $apply->amount }}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm mr-2" title="Setuju">
                                        <i class="fa-solid fa-check"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" title="Tolak">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
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