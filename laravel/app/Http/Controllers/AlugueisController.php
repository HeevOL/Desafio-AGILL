<?php

namespace App\Http\Controllers;

use App\Models\Alugueis;
use Illuminate\Http\Request;

class AlugueisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function historicoLocatario(string $id)
    {
        return Alugueis::all()->where('id_locatario', $id);
    }


    public function historicoLocador(string $id)
    {
        return Alugueis::all()->where('id_locador', $id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Alugueis::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function cancelarLocacao(Request $request, string $id)
    {
        $aluguel = Alugueis::findOrFail($id);
        $aluguel->where('status', 'agendado')->update(['status' => 'cancelado']);
        $aluguel = Alugueis::findOrFail($id);

        return $aluguel;
    }


    public function iniciarEstadia(Request $request, string $id)
    {
        $aluguel = Alugueis::findOrFail($id);
        $aluguel->where('status', 'agendado')->update(['status' => 'ativo']);
        $aluguel = Alugueis::findOrFail($id);

        return $aluguel;
    }


    public function cancelarEstadia(Request $request, string $id)
    {
        $aluguel = Alugueis::findOrFail($id);
        $aluguel->where('status', 'ativo')->update(['status' => 'finalizado']);
        $aluguel = Alugueis::findOrFail($id);

        return $aluguel;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
