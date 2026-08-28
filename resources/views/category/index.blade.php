@extends('user.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $title ?? '' }}
        </div>
        <div class="card-body">
            <div align="right" class="mb-3">
                <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $index => $value)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>
                                <a href="{{ route('category.edit', $value->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <form class="d-inline" action="{{ route('category.destroy', $value->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        Hapus
                                    </button>
                                </form>
                                {{-- <a href="{{ route('user.destroy', $value->id) }}" class="btn btn-danger btn-sm">Hapus</a> --}}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
