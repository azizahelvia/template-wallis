@extends('layouts.app')

<?php
    $page = "Data Barang";
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
    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>

    <!-- Table Data Barang -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                data-toggle="modal" data-target="#addinventory">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Tambah Barang
            </button>

            <!-- Modal Add Barang -->
            <div class="modal fade" id="addinventory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                        </div>
                        <form method="POST" action="{{ route('entryinventory.store') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" min="0" class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="number" min="0" class="form-control" name="stock">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="desc" class="form-control" style="resize: none;" cols="5"></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of Modal Add Barang -->

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventories as $inventory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $inventory->name }}</td>
                                <td>@currency($inventory->price)</td>
                                <td>{{ $inventory->stock }}</td>
                                <td>{{ $inventory->desc }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm mr-2"
                                        data-toggle="modal" data-target="#edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                                                </div>
                                                <form method="POST" action="{{ route('entryinventory.update', $inventory->id) }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Nama Barang</label>
                                                            <input type="text" class="form-control" name="name" value="{{ $inventory->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Harga</label>
                                                            <input type="number" min="0" class="form-control" name="price" value="{{ $inventory->price }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Stok</label>
                                                            <input type="number" min="0" class="form-control" name="stock" value="{{ $inventory->stock }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Deskripsi</label>
                                                            <textarea name="desc" class="form-control" style="resize: none;" cols="5" value="{{ $inventory->desc }}"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal Edit -->

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda ingin Menghapus Barang?</p>
                                                </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                        <a type="submit" href="{{ route('entryinventory.delete', $inventory->id) }}" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal Delete -->

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
@endsection
