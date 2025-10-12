@extends('layouts.master')

@section('konten')
    <h1>Edit Kategori</h1>
    <hr>
    <div class="card">
        <div class="card-header">Edit Data Kategori</div>
        <div class="card-body">
            <form action="/kategori/{{$kategori->id_kategori}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama Kategori </label>
                    <input type="text" class="form-control" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
                    @error('nama_kategori')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label class="form-label">Deskripsi</label>
                <div class="form-floating">
                    <textarea class="form-control" name="deskripsi" id="floatingTextarea2" style="height: 100px">{{ $kategori->deskripsi }}</textarea>
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
