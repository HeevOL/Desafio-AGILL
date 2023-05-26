<?php

namespace App\Http\Controllers;

use App\Models\Imoveis;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ImoveisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ttl = 5;

        return Cache::remember('key', $ttl, function () {
            return Imoveis::all();
        });
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
        $ttl = 10;
        try {
            $imovel = Imoveis::findOrFail($id);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Imovel não encontrado.'
            ], 404);
        }
        return Cache::remember('key', $ttl, function () use ($imovel){
            return $imovel;
        });
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
