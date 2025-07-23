<?php

namespace App\Http\Controllers;

use App\Models\tracer;
use App\Models\Alumni;
use App\Http\Requests\StoretracerRequest;
use App\Http\Requests\UpdatetracerRequest;
use Illuminate\Http\Request;
use App\Exports\TracerExport;
use Maatwebsite\Excel\Facades\Excel;

class TracerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracers = tracer::with('alumni')->paginate(10);
        return view('admin.tracer_index', compact('tracers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumni = Alumni::all();
        return view('admin.tracer_create', compact('alumni'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretracerRequest $request)
    {
        $validated = $request->validated();
        // Pastikan status ada di validasi request
        tracer::create($validated);

        return redirect()->route('admin.tracer_index')
            ->with('success', 'Data tracer berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(tracer $tracer)
    {
        $tracer->load('alumni');
        return view('admin.tracer_show', compact('tracer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tracer $tracer)
    {
        $alumni = Alumni::all();
        return view('admin.tracer_edit', compact('tracer', 'alumni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetracerRequest $request, tracer $tracer)
    {
        $validated = $request->validated();
        // Pastikan status ada di validasi request
        $tracer->update($validated);

        return redirect()->route('admin.tracer_index')
            ->with('success', 'Data tracer berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tracer $tracer)
    {
        $tracer->delete();

        return redirect()->route('admin.tracer.index')
            ->with('success', 'Data tracer berhasil dihapus.');
    }

    /**
     * Export all tracer data to Excel
     */
    public function exportAll()
    {
        return Excel::download(new TracerExport, 'data_tracer_study_' . date('Y-m-d_H-i-s') . '.xlsx');
    }
}
