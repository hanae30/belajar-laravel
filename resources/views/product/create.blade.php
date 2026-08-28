@extends('user.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $title ?? '' }}
        </div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold">Kategori</label>
                    <select class="form-control" name="category_id">
                        <option selected>Pilih Kategori</option>
                        <option value="1">Coffee</option>
                        <option value="2">Non Coffee</option>
                        <option value="3">Snack</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold">Nama Produk</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold">Harga</label>
                    <input type="text" class="form-control" name="price">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold">Deskripsi</label>
                    <textarea class="form-control" placeholder="Masukan deskripsi produk" name="description" style="height: 100px"></textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="{{ url()->previous() }}" class="text-muted">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
