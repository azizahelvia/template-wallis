@extends('layouts.app')

<?php
    $page = "Belanja";
?>

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-2 text-gray-800">Belanja</h1>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"
                data-toggle="modal" data-target="#addcart">
                <i class="fa-solid fa-cart-shopping"></i>
                Keranjang
            </button>
            <button type="button" class="d-none d-sm-inline btn btn-sm btn-primary shadow-sm"
                data-toggle="modal" data-target="#addCheckout">
                <i class="fas fa-cart-plus"></i>
                Checkout
            </button>

            <!-- Modal Add Cart -->
            <div class="modal fade" id="addcart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Keranjang {{ count($carts) > 0 ? "#" . $carts[0]->invoice_id : "" }}</h5>
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
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cart->inventory->name }}</td>
                                            <td>@currency($cart->inventory->price)</td>
                                            <td>{{ $cart->amount }}</td>
                                            <td>@currency($cart->inventory->price * $cart->amount)</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">Total Harga: @currency($total_cart)</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="modal-footer">
                            <a href="{{ route('belanjasiswa.checkout') }}" class="btn btn-success">Checkout</a>
                        </div>>
                    </div>
                </div>
            </div>
            <!-- End of Modal Add Cart -->

            <!-- Modal Add Chekout -->
            <div class="modal fade" id="addCheckout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Checkout </h5>
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
                                    @foreach ($checkouts as $checkout)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $checkout->inventory->name }}</td>
                                            <td>@currency($checkout->inventory->price)</td>
                                            <td>{{ $checkout->amount }}</td>
                                            <td>@currency($checkout->inventory->price * $checkout->amount)</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">Total Harga: @currency($total_checkout)</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="modal-footer">
                            <a href="{{ route('belanjasiswa.pay') }}" class="btn btn-success">Bayar</a>
                        </div>>
                    </div>
                </div>
            </div>
            <!-- End of Modal Add Chekout -->
        </div>

        <div class="row">
            @foreach ($inventories as $inventory)
                <div class="col-md-4 mt-3">
                    <div class="card" style="width: 20rem;">
                        <img src="{{ asset('img/food-illustration.jpg') }}" class="card-img-top" alt="Food Illustration">
                        <div class="card-body">
                            <h5 class="card-title">{{ $inventory->name }}</h5>
                            <p class="card-text">{{ $inventory->desc }}</p>
                            <p class="card-text">Harga: @currency($inventory->price)</p>
                        </div>
                        <form method="POST" action="{{ route('belanjasiswa.addcart', ["id"  => $inventory->id]) }}">
                            @csrf
                            <input type="number" style="width: 300px; margin: 0 10px;" name="amount" class="form-control" value="1">
                            <input type="hidden" name="inventory_id" value="1">
                            <button class="btn btn-primary mt-3 mb-2 ml-2" type="submit">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
