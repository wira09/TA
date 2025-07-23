<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-control" required>
        <option value="">Pilih Status</option>
        <option value="bekerja" {{ old('status', $tracer->status ?? '') == 'bekerja' ? 'selected' : '' }}>Bekerja
        </option>
        <option value="wiraswasta" {{ old('status', $tracer->status ?? '') == 'wiraswasta' ? 'selected' : '' }}>
            Wiraswasta</option>
        <option value="melanjutkan" {{ old('status', $tracer->status ?? '') == 'melanjutkan' ? 'selected' : '' }}>
            Melanjutkan Pendidikan</option>
        <option value="tidak bekerja" {{ old('status', $tracer->status ?? '') == 'tidak bekerja' ? 'selected' : '' }}>
            Tidak Bekerja</option>
    </select>
</div>

<div class="mb-3">
    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
    <input type="date" name="tanggal_mulai" class="form-control"
        value="{{ old('tanggal_mulai', $tracer->tanggal_mulai ?? '') }}" required>
</div>
{{-- <div class="mb-3">
    <label for="nama_instansi" class="form-label">Nama Instansi</label>
    <input type="text" name="nama_instansi" class="form-control"
        value="{{ old('nama_instansi', $tracer->nama_instansi ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="jabatan" class="form-label">Jabatan</label>
    <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $tracer->jabatan ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label for="kesesuaian_kerja" class="form-label">Kesesuaian Kerja</label>
    <select name="kesesuaian_kerja" class="form-control" required>
        <option value="">Pilih Kesesuaian</option>
        <option value="Sangat Sesuai"
            {{ old('kesesuaian_kerja', $tracer->kesesuaian_kerja ?? '') == 'Sangat Sesuai' ? 'selected' : '' }}>Sangat
            Sesuai</option>
        <option value="Sesuai"
            {{ old('kesesuaian_kerja', $tracer->kesesuaian_kerja ?? '') == 'Sesuai' ? 'selected' : '' }}>Sesuai</option>
        <option value="Kurang Sesuai"
            {{ old('kesesuaian_kerja', $tracer->kesesuaian_kerja ?? '') == 'Kurang Sesuai' ? 'selected' : '' }}>Kurang
            Sesuai</option>
        <option value="Tidak Sesuai"
            {{ old('kesesuaian_kerja', $tracer->kesesuaian_kerja ?? '') == 'Tidak Sesuai' ? 'selected' : '' }}>Tidak
            Sesuai</option>
    </select>
</div>
<div class="mb-3">
    <label for="kelurahan" class="form-label">Kelurahan</label>
    <input type="text" name="kelurahan" class="form-control" value="{{ old('kelurahan', $tracer->kelurahan ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label for="kab_kota" class="form-label">Kab/Kota</label>
    <input type="text" name="kab_kota" class="form-control" value="{{ old('kab_kota', $tracer->kab_kota ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label for="provinsi" class="form-label">Provinsi</label>
    <input type="text" name="provinsi" class="form-control" value="{{ old('provinsi', $tracer->provinsi ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label for="kode_pos" class="form-label">Kode Pos</label>
    <input type="text" name="kode_pos" class="form-control" value="{{ old('kode_pos', $tracer->kode_pos ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label for="tgl_update" class="form-label">Tanggal Update</label>
    <input type="date" name="tgl_update" class="form-control"
        value="{{ old('tgl_update', $tracer->tgl_update ?? '') }}" required>
</div> --}}
