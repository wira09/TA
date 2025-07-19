@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Edit Data Tracer</h1>
                <a href="{{ route('admin.tracer.show', $tracer) }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-2">
                    Kembali
                </a>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('admin.tracer.update', $tracer) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="alumni_id" class="block text-sm font-medium text-gray-700 mb-2">Alumni</label>
                        <select name="alumni_id" id="alumni_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('alumni_id') border-red-500 @enderror"
                            required>
                            <option value="">Pilih Alumni</option>
                            @foreach ($alumni as $alum)
                                <option value="{{ $alum->id }}"
                                    {{ old('alumni_id', $tracer->alumni_id) == $alum->id ? 'selected' : '' }}>
                                    {{ $alum->nama }} - {{ $alum->nim }}
                                </option>
                            @endforeach
                        </select>
                        @error('alumni_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mulai_kerja" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai
                            Kerja</label>
                        <input type="date" name="mulai_kerja" id="mulai_kerja"
                            value="{{ old('mulai_kerja', $tracer->mulai_kerja->format('Y-m-d')) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('mulai_kerja') border-red-500 @enderror"
                            required>
                        @error('mulai_kerja')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_instansi" class="block text-sm font-medium text-gray-700 mb-2">Nama
                            Instansi</label>
                        <input type="text" name="nama_instansi" id="nama_instansi"
                            value="{{ old('nama_instansi', $tracer->nama_instansi) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama_instansi') border-red-500 @enderror"
                            required>
                        @error('nama_instansi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan', $tracer->jabatan) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('jabatan') border-red-500 @enderror"
                            required>
                        @error('jabatan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kesesuaian_kerja" class="block text-sm font-medium text-gray-700 mb-2">Kesesuaian
                            Kerja</label>
                        <select name="kesesuaian_kerja" id="kesesuaian_kerja"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('kesesuaian_kerja') border-red-500 @enderror"
                            required>
                            <option value="">Pilih Kesesuaian</option>
                            <option value="Sangat Sesuai"
                                {{ old('kesesuaian_kerja', $tracer->kesesuaian_kerja) == 'Sangat Sesuai' ? 'selected' : '' }}>
                                Sangat Sesuai</option>
                            <option value="Sesuai"
                                {{ old('kesesuaian_kerja', $tracer->kesesuaian_kerja) == 'Sesuai' ? 'selected' : '' }}>
                                Sesuai</option>
                            <option value="Kurang Sesuai"
                                {{ old('kesesuaian_kerja', $tracer->kesesuaian_kerja) == 'Kurang Sesuai' ? 'selected' : '' }}>
                                Kurang Sesuai</option>
                            <option value="Tidak Sesuai"
                                {{ old('kesesuaian_kerja', $tracer->kesesuaian_kerja) == 'Tidak Sesuai' ? 'selected' : '' }}>
                                Tidak Sesuai</option>
                        </select>
                        @error('kesesuaian_kerja')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kelurahan" class="block text-sm font-medium text-gray-700 mb-2">Kelurahan</label>
                        <input type="text" name="kelurahan" id="kelurahan"
                            value="{{ old('kelurahan', $tracer->kelurahan) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('kelurahan') border-red-500 @enderror"
                            required>
                        @error('kelurahan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kab_kota" class="block text-sm font-medium text-gray-700 mb-2">Kabupaten/Kota</label>
                        <input type="text" name="kab_kota" id="kab_kota"
                            value="{{ old('kab_kota', $tracer->kab_kota) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('kab_kota') border-red-500 @enderror"
                            required>
                        @error('kab_kota')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                        <input type="text" name="provinsi" id="provinsi"
                            value="{{ old('provinsi', $tracer->provinsi) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('provinsi') border-red-500 @enderror"
                            required>
                        @error('provinsi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="kode_pos" class="block text-sm font-medium text-gray-700 mb-2">Kode Pos</label>
                        <input type="text" name="kode_pos" id="kode_pos"
                            value="{{ old('kode_pos', $tracer->kode_pos) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('kode_pos') border-red-500 @enderror"
                            required>
                        @error('kode_pos')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="tgl_update" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Update</label>
                        <input type="date" name="tgl_update" id="tgl_update"
                            value="{{ old('tgl_update', $tracer->tgl_update->format('Y-m-d')) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tgl_update') border-red-500 @enderror"
                            required>
                        @error('tgl_update')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('admin.tracer.show', $tracer) }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Batal
                        </a>
                        <button type="submit"
                            class="btn btn-primary ml-2">
                            Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
