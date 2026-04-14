<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Askeb;

class AdminAskebController extends Controller
{
    public function index()
    {
        $askeb = Askeb::with('user')->latest()->get();

        return view('admin.askeb.index', compact('askeb'));
    }

    public function show($id)
    {
        $askeb = Askeb::findOrFail($id);

        return view('admin.askeb.show', compact('askeb'));
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
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
