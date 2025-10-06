@extends('layouts.master')

@section('konten')
    <h1>Tambah Daftar Produk</h1>
    <hr>
    <div class="card">
        <div class="card-header">Tambah Data Produk</div>
        <div class="card-body">
            <form action="/product" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" value="{{ old('nama_produk') }}">
                            @error('nama_produk')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Harga Produk </label>
                            <input type="text" class="form-control" name="harga_produk"
                                value="{{ old('harga_produk') }}">
                            @error('harga_produk')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="deskripsi" id="floatingTextarea2" style="height: 100px">{{ old('deskripsi') }}</textarea>
                            <label for="floatingTextarea2">Deskripsi Produk</label>
                            @error('deskripsi')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
