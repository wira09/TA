@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Data Tracer Alumni</h1>
        <a href="{{ route('user.tracer.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Instansi</th>
                    <th>Jabatan</th>
                    <th>Kesesuaian Kerja</th>
                    <th>Mulai Kerja</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tracers as $tracer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tracer->nama_instansi }}</td>
                        <td>{{ $tracer->jabatan }}</td>
                        <td>{{ $tracer->kesesuaian_kerja }}</td>
                        <td>{{ $tracer->mulai_kerja }}</td>
                        <td>
                            <a href="{{ route('user.tracer.show', $tracer->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('user.tracer.edit', $tracer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('user.tracer.destroy', $tracer->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
