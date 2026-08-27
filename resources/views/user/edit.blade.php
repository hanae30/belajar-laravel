@extends('user.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $title ?? '' }}
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $edit->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $edit->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $edit->email }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold">Password</label>
                    <input type="password" class="form-control" name="password">
                    <small class="text-muted">(kosongkan jika tidak ingin diubah)</small>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    <a href="{{ route('user.index') }}" class="text-muted">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
