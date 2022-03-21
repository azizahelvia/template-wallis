@extends('layouts.app')

<?php
    $page = "Belanja";
?>

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Belanja</h1>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                data-toggle="modal" data-target="#addcart">
                <i class="fas fa-cart-plus"></i>
                Keranjang
            </button>

            <!-- Modal Add Cart -->
            <div class="modal fade" id="addcart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Keranjang #INV_202938291</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Item</th>
                                        <th>Harga Item</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Nasi Goreng</td>
                                        <td>Rp 15000</td>
                                        <td>2</td>
                                        <td>Rp 30000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">Total Harga: Rp 30000</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="modal-footer">
                            <a href="#" class="btn btn-primary">Bayar</a>
                        </div>>
                    </div>
                </div>
            </div>
            <!-- End of Modal Add Cart -->
        </div>

        <div class="row">
            <div class="col-md-4 mt-3">
                <div class="card" style="width: 20rem;">
                    <img src="{{ asset('img/food-illustration.jpg') }}" class="card-img-top" alt="Nasi Goreng">
                    <div class="card-body">
                        <h5 class="card-title">Nasi Goreng</h5>
                        <p class="card-text">Harga: Rp 15000</p>
                    </div>
                    <form method="POST" action="">
                        @csrf
                        <input type="number" style="width: 300px; margin: 0 10px;" name="jumlah" class="form-control" value="1">
                        <input type="hidden" name="barang_id" value="1">
                        <button class="btn btn-primary mt-3 mb-2 ml-2" type="submit">Tambah ke Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
