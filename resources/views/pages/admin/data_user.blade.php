@extends('layouts.app')

<?php
    $page = "Data User";
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
    <h1 class="h3 mb-2 text-gray-800">Data User</h1>

    <!-- Table Data User -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                data-toggle="modal" data-target="#adduser">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Tambah User
            </button>

            <!-- Modal Add User -->
            <div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                        </div>
                        <form method="POST" action="{{ route('datauser.add') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                                        <option value="">Pilih Opsi</option>
                                        <option value="1">Administrator</option>
                                        <option value="2">Bank Mini</option>
                                        <option value="3">Kantin</option>
                                        <option value="4">Siswa</option>
                                    </select>

                                    @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
            <!-- End of Modal Add User -->

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Saldo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>-</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm mr-2"
                                        data-toggle="modal" data-target="#edit-{{ $user->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="edit-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit User {{ $user->name }}</h5>
                                                </div>
                                                <form method="POST" action="{{ route('datauser.edit', $user->id) }}">
                                                    @method("put")
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak diubah">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Konfirmasi Password</label>
                                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Kosongkan jika tidak diubah">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Role</label>
                                                            <select class="form-control" name="role_id">
                                                                <option value="">Pilih Opsi</option>
                                                                <option value="1" {{ $user->role_id == "1" ? "selected" : "" }}>Administrator</option>
                                                                <option value="2" {{ $user->role_id == "2" ? "selected" : "" }}>Bank Mini</option>
                                                                <option value="3" {{ $user->role_id == "3" ? "selected" : "" }}>Kantin</option>
                                                                <option value="4" {{ $user->role_id == "4" ? "selected" : "" }}>Siswa</option>
                                                            </select>
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
                                        data-target="#delete-{{ $user->id }}" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="delete-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus User {{ $user->name }}</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda ingin Menghapus User?</p>
                                                </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                        <form action="{{ route('datauser.delete', $user->id) }}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
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
