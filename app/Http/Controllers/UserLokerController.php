<?php

namespace App\Http\Controllers;

use App\Models\user_loker;
use App\Http\Requests\Storeuser_lokerRequest;
use App\Http\Requests\Updateuser_lokerRequest;

class UserLokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokers = \App\Models\Loker::latest()->paginate(10);
        return view('user.loker_index', compact('lokers'));
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
    public function store(Storeuser_lokerRequest $request)
    {
        $id = $request->input('id'); // atau dapatkan nilai $id dari sumber lain
        $loker = \App\Models\Loker::findOrFail($id);

        return view('user.loker_show', compact('lokers'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $loker = \App\Models\Loker::findOrFail($id);
        return view('user.loker_show', compact('loker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user_loker $user_loker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateuser_lokerRequest $request, user_loker $user_loker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user_loker $user_loker)
    {
        //
    }
}
