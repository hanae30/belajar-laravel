@extends('greeting')
@section('content')
    <br>
    <br>
    <form action="{{ route('action-perkalian') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="angka1">Angka 1:</label>
            <input type="number" name="angka1" id="angka1" placeholder="Masukan angka" required>
        </div>
        <div class="mb-3">
            <label for="angka2">Angka 2:</label>
            <input type="number" name="angka2" id="angka2" placeholder="Masukan angka" required>
        </div>
        <button type="submit">Hitung</button>
    </form>

    <p>Hasilnya adalah: {{ $hasilkali }}</p>
@endsection
