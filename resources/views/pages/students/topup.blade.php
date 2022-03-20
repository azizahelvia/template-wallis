@extends('layouts.app')

<?php 
    $page = "Topup Saldo";
?>

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Topup Saldo</h1>

    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Topup Saldo</h6>
        </div> --}}
        <div class="card-body">
            <form method="POST" action="#">
                @method("put")
                @csrf
                <h5 class="m-0 font-weight-bold text-primary">Isikan Topup Saldo</h5>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="number" class="form-control" name="amount" min="0" placeholder="Masukkan angka saldo">
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block">Topup</button>
            </form>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@endsection