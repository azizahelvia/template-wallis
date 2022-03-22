@extends('layouts.app')

<?php
    $page = "Kasir Kantin";
?>

@section('content')
<div class="container-fluid">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

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
                        @foreach ($shop_by_invoices as $shop_by_invoice)
                            @if ($shop_by_invoice->status == 1 || $shop_by_invoice->status == 2)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $shop_by_invoice->user->name }}</td>
                                    <td>{{ $shop_by_invoice->invoice_id }}</td>
                                    <td>{{ $shop_by_invoice->status == 1 ?  "BELUM BAYAR" : "SUDAH BAYAR"}}</td>
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
                                                        <h5 class="modal-title" id="exampleModalLabel">Pesanan {{ $shop_by_invoice->invoice_id }}</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>Nama</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Harga</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $counter = 1;
                                                                    $total_price = 0;
                                                                ?>
                                                                @foreach ($shop_submissions as $shop_submission)
                                                                    @if ($shop_submission->invoice_id == $shop_by_invoice->invoice_id)
                                                                        <?php
                                                                            $total_price += $shop_submission->amount * $shop_submission->inventory->price;
                                                                        ?>
                                                                        <tr>
                                                                            <td>{{ $counter++ }}</td>
                                                                            <td>{{ $shop_submission->user->name }}</td>
                                                                            <td>{{ $shop_submission->amount }}</td>
                                                                            <td>{{ $shop_submission->inventory->price }}</td>
                                                                            <td>{{ $shop_submission->amount * $shop_submission->inventory->price }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                        <p>Total Harga: @currency($total_price)</p>
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
                                        <a href="{{ route('casheermerchant.approved', ["invoice_id" => $shop_by_invoice->invoice_id]) }}" class="btn btn-success mr-2" title="Terima">
                                            <i class="fa-solid fa-square-check"></i>
                                        </a>
                                        <a href="{{ route('casheermerchant.rejected', ["invoice_id" => $shop_by_invoice->invoice_id]) }}" class="btn btn-danger" title="Tolak">
                                            <i class="fa-solid fa-square-xmark"></i>
                                        </a>
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
