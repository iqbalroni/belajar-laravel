@extends('layouts.master')

@section('title','Tambah Kategori')

@section('konten')
    <h1>Tambah Daftar Kategori</h1>
    <hr>
    <div class="card">
        <div class="card-header">Tambah Data Kategori</div>
        <div class="card-body">
            <form action="/kategori" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Kategori </label>
                    <input type="text" class="form-control" name="nama_kategori" value="{{ old('harga_produk') }}">
                    @error('nama_kategori')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label class="form-label">Deskripsi</label>
                <div class="form-floating">
                    <textarea class="form-control" name="deskripsi" id="floatingTextarea2" style="height: 100px">{{ old('deskripsi') }}</textarea>
                    <label for="floatingTextarea2">Deskripsi Produk</label>
                    @error('deskripsi')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
            </form>
        </div>
    </div>
@endsection
