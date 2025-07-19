@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Detail Data Tracer</h1>
        <table class="table table-bordered">
            <tr>
                <th>Nama Instansi</th>
                <td>{{ $tracer->nama_instansi }}</td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>{{ $tracer->jabatan }}</td>
            </tr>
            <tr>
                <th>Kesesuaian Kerja</th>
                <td>{{ $tracer->kesesuaian_kerja }}</td>
            </tr>
            <tr>
                <th>Mulai Kerja</th>
                <td>{{ $tracer->mulai_kerja }}</td>
            </tr>
            <tr>
                <th>Kelurahan</th>
                <td>{{ $tracer->kelurahan }}</td>
            </tr>
            <tr>
                <th>Kab/Kota</th>
                <td>{{ $tracer->kab_kota }}</td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td>{{ $tracer->provinsi }}</td>
            </tr>
            <tr>
                <th>Kode Pos</th>
                <td>{{ $tracer->kode_pos }}</td>
            </tr>
            <tr>
                <th>Tanggal Update</th>
                <td>{{ $tracer->tgl_update }}</td>
            </tr>
        </table>
        <a href="{{ route('user.tracer.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
