@extends('user.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $title ?? '' }}
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
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
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    <a href="{{ route('category.index') }}" class="text-muted">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
