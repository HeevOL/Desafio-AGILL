<?php

namespace App\Http\Controllers;

use App\Models\Alugueis;
use Exception;
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
        try {
            $aluguel = Alugueis::create($request->all());

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Erro ao cadastrar reserva.'
            ], 404);
        }

        return response()->json([
                'message' => 'Reserva de aluguel cadastrada.',
                'infos' => $aluguel
            ], 201);
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
    public function cancelarLocacao(string $id)
    {
        try {
            $aluguel = Alugueis::findOrFail($id);
            if('status' !== 'agendado'){
                throw new Exception;
            }

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Erro ao tentar cancelar reserva.'
            ], 404);
        }

        $aluguel->where('status', 'agendado')->update(['status' => 'cancelado']);
        $aluguel = Alugueis::findOrFail($id);

        return response()->json([
                'message' => 'Reserva cancelada com sucesso.',
                'infos' => $aluguel
            ], 201);
    }


    public function iniciarEstadia(string $id)
    {
        try {
            $aluguel = Alugueis::findOrFail($id);
            if('status' !== 'agendado'){
                throw new Exception;
            }

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Erro ao tentar iniciar estadia.'
            ], 404);
        }

        $aluguel->where('status', 'agendado')->update(['status' => 'ativo']);
        $aluguel = Alugueis::findOrFail($id);

        return response()->json([
                'message' => 'Estadia iniciada.',
                'infos' => $aluguel
            ], 201);
    }


    public function cancelarEstadia(string $id)
    {
        try {
            $aluguel = Alugueis::findOrFail($id);
            if('status' !== 'ativo'){
                throw new Exception;
            }

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Erro ao tentar cancelar estadia.'
            ], 404);
        }

        $aluguel->where('status', 'ativo')->update(['status' => 'finalizado']);
        $aluguel = Alugueis::findOrFail($id);

        return response()->json([
                'message' => 'Estadia cancelada com sucesso.',
                'infos' => $aluguel
            ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
