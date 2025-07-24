@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-3">Detail Data Tracer</h1>
        <table class="table table-bordered mt-3">
            <tr>
                <th>Status</th>
                <td>{{ ucwords($tracer->status) }}</td>
            </tr>
            <tr>
                <th>Tanggal Mulai</th>
                <td> {{ $tracer->tanggal_mulai->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <th>Soal 1</th>
                <td>{{ $tracer->alumni->bekerja->soal_1 }}</td>
            </tr>
            <tr>
                <th>Soal 2</th>
                <td>{{ $tracer->alumni->bekerja->soal_2 }}</td>
            </tr>
            <tr>
                <th>Soal 3</th>
                <td>{{ $tracer->alumni->bekerja->soal_3 }}</td>
            </tr>
            <tr>
                <th>Soal 4</th>
                <td>{{ $tracer->alumni->bekerja->soal_4 }}</td>
            </tr>
            <tr>
                <th>Soal 5</th>
                <td>{{ $tracer->alumni->bekerja->soal_5 }}</td>
            </tr>
        </table>
        <a href="{{ route('user.tracer.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
