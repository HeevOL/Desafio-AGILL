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
        try{
            $aluguel = Alugueis::all()->where('id_locatario', $id);
            if ($aluguel == '[]') {
                throw new Exception;
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Locatário não encontrado.'
            ], 404);
        }
        return $aluguel;
    }


    public function historicoLocador(string $id)
    {
        try{
            $aluguel = Alugueis::all()->where('id_locador', $id);
            if ($aluguel == '[]') {
                throw new Exception;
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Locador não encontrado.'
            ], 404);
        }
        return $aluguel;
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
            if($aluguel['status'] != 'agendado'){
                throw new Exception;
            }

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Erro ao tentar cancelar reserva.'
            ], 404);
        }

        $aluguel->update(['status' => 'cancelado']);

        return response()->json([
                'message' => 'Reserva cancelada com sucesso.',
                'infos' => $aluguel
            ], 201);
    }


    public function iniciarEstadia(string $id)
    {
        try {
            $aluguel = Alugueis::findOrFail($id);
            if($aluguel['status'] != 'agendado'){
                throw new Exception;
            }

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Erro ao tentar iniciar estadia.'
            ], 404);
        }

        $aluguel->update(['status' => 'ativo']);

        return response()->json([
                'message' => 'Estadia iniciada.',
                'infos' => $aluguel
            ], 201);
    }


    public function finalizarEstadia(string $id)
    {
        try {
            $aluguel = Alugueis::findOrFail($id);
            if($aluguel['status'] != 'ativo'){
                throw new Exception;
            }

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Erro ao tentar finalizar estadia.'
            ], 404);
        }

        $aluguel->update(['status' => 'finalizado']);

        return response()->json([
                'message' => 'Estadia finalizada com sucesso.',
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
