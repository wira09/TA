<?php

namespace App\Http\Controllers;

use App\Models\user_alumni;
use App\Models\alumni;
use App\Http\Requests\Storeuser_alumniRequest;
use App\Http\Requests\Updateuser_alumniRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // Get the alumni data directly since we have alumni_id in users table
        $alumni = \App\Models\alumni::where('nim', $user->nim)->first();
        return view('user.alumni_index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeuser_alumniRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $alumni = \App\Models\alumni::where('nim', $user->nim)->firstOrFail();

        if ($alumni->id != $id) {
            abort(403, 'Unauthorized action.');
        }
        // layouts.user dan navigation_user otomatis dipakai di resources/views/user/alumni_show.blade.php
        return view('user.alumni_show', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $alumni = \App\Models\alumni::where('nim', $user->nim)->firstOrFail();

        if ($alumni->id != $id) {
            abort(403, 'Unauthorized action.');
        }
        // layouts.user dan navigation_user otomatis dipakai di resources/views/user/alumni_edit.blade.php
        return view('user.alumni_edit', compact('alumni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $alumni = alumni::where('nim', $user->nim)->firstOrFail();

        if ($alumni->id != $id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:alumnis,nim,' . $id,
            'email' => 'required|email|unique:alumnis,email,' . $id,
            'no_hp' => 'required',
            'angkatan' => 'required',
            'tahun_lulus' => 'required',
            'program_studi' => 'required',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'required',
            'Foto' => 'nullable|image|max:2048'
        ]);

        // Handle photo upload
        if ($request->hasFile('Foto')) {
            // Delete old photo if exists
            if ($alumni->Foto) {
                Storage::disk('public')->delete($alumni->Foto);
            }
            $validated['Foto'] = $request->file('Foto')->store('alumni', 'public');
        }

        // Update alumni record
        $alumni->update($validated);

        // Update user record
        $user->update([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'nim' => $validated['nim']
        ]);

        return redirect()
            ->route('user.alumni.index')
            ->with('success', 'Profil alumni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user_alumni $user_alumni)
    {
        //
    }
}
