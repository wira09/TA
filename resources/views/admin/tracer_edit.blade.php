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
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" id="status"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror"
                            required>
                            <option value="">Pilih Status</option>
                            <option value="bekerja"
                                {{ old('status', $tracer->status ?? '') == 'bekerja' ? 'selected' : '' }}>Bekerja
                            </option>
                            <option value="wiraswasta"
                                {{ old('status', $tracer->status ?? '') == 'wiraswasta' ? 'selected' : '' }}>
                                Wiraswasta</option>
                            <option value="melanjutkan"
                                {{ old('status', $tracer->status ?? '') == 'melanjutkan' ? 'selected' : '' }}>
                                Melanjutkan Pendidikan</option>
                            <option value="tidak bekerja"
                                {{ old('status', $tracer->status ?? '') == 'tidak bekerja' ? 'selected' : '' }}>
                                Tidak Bekerja</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                            Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('tanggal_mulai') border-red-500 @enderror"
                            value="{{ old('tanggal_mulai', $tracer->tanggal_mulai->format('Y-m-d')) }}" required>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('admin.tracer.index', $tracer) }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary ml-2">
                            Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
