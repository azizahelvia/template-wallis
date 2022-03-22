@extends('layouts.app')

<?php
    $page = "Data Transaksi";
?>

@section('content')
    <div class="container-fluid">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>

        <!-- Table Data Transaction -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shop_by_invoices as $shop_by_invoice)
                                @if ($shop_by_invoice->status == 3 || $shop_by_invoice->status == 4)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $shop_by_invoice->user->name }}</td>
                                        <td>{{ $shop_by_invoice->invoice_id }}</td>
                                        <td>
                                            @if ($shop_by_invoice->status == 3)
                                                BELANJA DITERIMA

                                                @else
                                                    BELANJA DITOLAK
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm mr-2" data-toggle="modal"
                                            data-target="#detail" title="Detail">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>

                                            <!-- Modal Detail -->
                                            <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog ">
                                                    <div class="modal-content p-3">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="text-dark">Nama User: {{ $shop_by_invoice->user->name }}</h5>
                                                            <p class="text-dark">
                                                                Status: {{ $shop_by_invoice->status == 3 ? "BELANJA DITERIMA" : "BELANJA DITOLAK" }}
                                                            </p>
                                                        </div>

                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama Pesanan</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Harga</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $total_price = 0;
                                                                ?>
                                                                @foreach ($shop_submissions as $shop_submission)
                                                                    @if ($shop_submission->invoice_id == $shop_by_invoice->invoice_id)
                                                                        <?php
                                                                            $total_price += $shop_submission->amount * $shop_submission->inventory->price;
                                                                        ?>
                                                                        <tr>
                                                                            <td>{{ $shop_submission->inventory->name }}</td>
                                                                            <td>{{ $shop_submission->amount }}</td>
                                                                            <td>{{ $shop_submission->inventory->price }}</td>
                                                                            <td>{{ $shop_submission->amount * $shop_submission->inventory->price }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                        <p>Total Harga: Rp 30000</p>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of Modal Detail -->

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete" title="Hapus">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                            <!-- Modal Delete -->
                                            <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Transaksi</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah Anda ingin Menghapus Transaksi?</p>
                                                        </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                                <a type="submit" href="{{ route('datatransaction.delete', $shop_by_invoice->id) }}" class="btn btn-danger">Hapus</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of Modal Delete -->

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
