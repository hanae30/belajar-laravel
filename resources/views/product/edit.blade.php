@extends('user.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $title ?? '' }}
        </div>
        <div class="card-body">
            <form action="{{ route('product.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold">Kategori</label>
                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $edit->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $edit->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ $edit->price }}">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold">Deskripsi</label>
                    <textarea class="form-control" placeholder="Masukan deskripsi produk" name="description" style="height: 100px">{{ old('description', $edit->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    <a href="{{ route('product.index') }}" class="text-muted">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
