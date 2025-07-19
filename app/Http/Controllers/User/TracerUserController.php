<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\tracer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TracerUserController extends Controller
{
    use AuthorizesRequests;

    // Tampilkan semua data tracer milik alumni yang sedang login
    public function index()
    {
        $alumniId = Auth::user()->alumni->id ?? null;

        if (!$alumniId) {
            return redirect()->route('user.alumni.index')->with('error', 'Data alumni tidak ditemukan.');
        }

        $tracers = tracer::where('alumni_id', $alumniId)->orderBy('created_at', 'desc')->get();
        return view('user.tracer.index', compact('tracers'));
    }

    // Tampilkan form tambah tracer
    public function create()
    {
        $alumniId = Auth::user()->alumni->id ?? null;

        if (!$alumniId) {
            return redirect()->route('user.alumni.index')->with('error', 'Data alumni tidak ditemukan.');
        }

        return view('user.tracer.create');
    }

    // Simpan data tracer baru
    public function store(Request $request)
    {
        $alumniId = Auth::user()->alumni->id ?? null;

        if (!$alumniId) {
            return redirect()->route('user.alumni.index')->with('error', 'Data alumni tidak ditemukan.');
        }

        $validated = $request->validate([
            'mulai_kerja' => 'required|date',
            'nama_instansi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kesesuaian_kerja' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'kab_kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'tgl_update' => 'required|date',
        ]);

        $validated['alumni_id'] = $alumniId;
        tracer::create($validated);

        return redirect()->route('user.tracer.index')->with('success', 'Data tracer berhasil ditambahkan.');
    }

    // Tampilkan detail tracer
    public function show(tracer $tracer)
    {
        $this->authorize('view', $tracer);
        return view('user.tracer.show', compact('tracer'));
    }

    // Tampilkan form edit tracer
    public function edit(tracer $tracer)
    {
        $this->authorize('update', $tracer);
        return view('user.tracer.edit', compact('tracer'));
    }

    // Update data tracer
    public function update(Request $request, tracer $tracer)
    {
        $this->authorize('update', $tracer);

        $validated = $request->validate([
            'mulai_kerja' => 'required|date',
            'nama_instansi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kesesuaian_kerja' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'kab_kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'tgl_update' => 'required|date',
        ]);

        $tracer->update($validated);

        return redirect()->route('user.tracer.index')->with('success', 'Data tracer berhasil diupdate.');
    }

    // Hapus data tracer
    public function destroy(tracer $tracer)
    {
        $this->authorize('delete', $tracer);
        $tracer->delete();

        return redirect()->route('user.tracer.index')->with('success', 'Data tracer berhasil dihapus.');
    }
}
