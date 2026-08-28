@extends('user.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $title ?? '' }}
        </div>
        <div class="card-body">
            <div align="right" class="mb-3">
                <a href="{{ route('product.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $value)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $value->category->name }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->price }}</td>
                            <td>{{ $value->description }}</td>

                            <td>
                                <a href="{{ route('product.edit', $value->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <form class="d-inline" action="{{ route('product.destroy', $value->id) }}" method="POST">
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
