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
        </table>
        <a href="{{ route('user.tracer.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
