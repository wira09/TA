@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Detail Data Tracer</h1>
                <div class="flex space-x-2 mt-2">
                    <a href="{{ route('admin.tracer.edit', $tracer) }}"
                        class="btn btn-warning mr-2">
                        Edit
                    </a>
                    <a href="{{ route('admin.tracer.index') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-900">Informasi Alumni</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Data Alumni</h3>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Nama</dt>
                                    <dd class="text-sm text-gray-900">{{ $tracer->alumni->nama ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">NIM</dt>
                                    <dd class="text-sm text-gray-900">{{ $tracer->alumni->nim ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="text-sm text-gray-900">{{ $tracer->alumni->email ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Program Studi</dt>
                                    <dd class="text-sm text-gray-900">{{ $tracer->alumni->program_studi ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Tahun Lulus</dt>
                                    <dd class="text-sm text-gray-900">{{ $tracer->alumni->tahun_lulus ?? 'N/A' }}</dd>
                                </div>
                            </dl>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Data Pekerjaan</h3>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Tanggal Mulai Kerja</dt>
                                    <dd class="text-sm text-gray-900">{{ $tracer->mulai_kerja->format('d/m/Y') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Nama Instansi</dt>
                                    <dd class="text-sm text-gray-900">{{ $tracer->nama_instansi }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Jabatan</dt>
                                    <dd class="text-sm text-gray-900">{{ $tracer->jabatan }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Kesesuaian Kerja</dt>
                                    <dd class="text-sm text-gray-900">
                                        <span
                                            class="px-2 py-1 text-xs font-medium rounded-full
                                        @if ($tracer->kesesuaian_kerja == 'Sangat Sesuai') bg-green-100 text-green-800
                                        @elseif($tracer->kesesuaian_kerja == 'Sesuai') bg-blue-100 text-blue-800
                                        @elseif($tracer->kesesuaian_kerja == 'Kurang Sesuai') bg-yellow-100 text-yellow-800
                                        @else bg-red-100 text-red-800 @endif">
                                            {{ $tracer->kesesuaian_kerja }}
                                        </span>
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Tanggal Update</dt>
                                    <dd class="text-sm text-gray-900">{{ $tracer->tgl_update->format('d/m/Y') }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Alamat Instansi</h3>
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Kelurahan</dt>
                                <dd class="text-sm text-gray-900">{{ $tracer->kelurahan }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Kabupaten/Kota</dt>
                                <dd class="text-sm text-gray-900">{{ $tracer->kab_kota }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Provinsi</dt>
                                <dd class="text-sm text-gray-900">{{ $tracer->provinsi }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Kode Pos</dt>
                                <dd class="text-sm text-gray-900">{{ $tracer->kode_pos }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
