@extends('layouts.app')

<?php
    $page = "Topup Saldo";
?>

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Saldo Anda : @currency($balance_submissions->balance)</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('topupsaldo.add') }}">
                @csrf
                <h5 class="m-0 font-weight-bold text-primary">Isikan Topup Saldo</h5>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="number" class="form-control" name="amount" min="0" placeholder="Masukkan angka saldo">
                        <input type="hidden" name="type" value="1">
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block">Topup</button>
            </form>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@endsection
