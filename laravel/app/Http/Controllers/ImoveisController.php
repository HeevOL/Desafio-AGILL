<?php

namespace App\Http\Controllers;

use App\Models\Imoveis;
use Illuminate\Http\Request;

class ImoveisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Imoveis::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Imoveis::findOrFail($id);
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
