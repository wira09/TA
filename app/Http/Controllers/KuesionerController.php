<?php

namespace App\Http\Controllers;

use App\Models\kuesioner;
use App\Http\Requests\StorekuesionerRequest;
use App\Http\Requests\UpdatekuesionerRequest;

class KuesionerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kusioners'] = kusioner::latest()->paginate(10);
        return view('admin.kuesioner_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kuesioner_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\Illuminate\Http\Request $request)
    {

        $validated = $request->validate([
            'soal' => 'required|string',
            'pilihan_a' => 'required|string',
            'pilihan_b' => 'required|string',
            'pilihan_c' => 'required|string',
            'pilihan_d' => 'required|string',
        ]);

        kusioner::create($validated);

        return redirect()->route('admin.kuesioner.index')
            ->with('success', 'kuesioner berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(kuesioner $kusioner)
    {
        $jawabans = $kusioner->jawabans()->with('user')->get();
        return view('admin.kuesioner_show', compact('kuesioner', 'jawabans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kuesioner $kusioner)
    {
        return view('admin.kuesioner_edit', compact('kuesioner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\Illuminate\Http\Request $request, kuesioner $kuesioner)
    {
        $validated = $request->validate([
            'soal' => 'required|string',
            'pilihan_a' => 'required|string',
            'pilihan_b' => 'required|string',
            'pilihan_c' => 'required|string',
            'pilihan_d' => 'required|string',
        ]);

        $kuesioner->update($validated);

        return redirect()->route('admin.kuesioner.index')
            ->with('success', 'kuesioner berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kuesioner $kuesioner)
    {
        $kuesioner->delete();

        return redirect()->route('admin.kuesioner.index')
            ->with('success', 'kuesioner berhasil dihapus!');
    }

    
}
