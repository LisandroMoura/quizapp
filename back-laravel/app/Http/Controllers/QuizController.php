<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;  // This is the correct way to use HTTP status codes


use Illuminate\Database\Eloquent\ModelNotFoundException;

class QuizController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Quiz::orderBy('id', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $quiz = Quiz::create($request->all());

        // retornar os dados
        return response()->json([
            "success" => true,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        return response()->json(compact('quiz'), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $quiz->update($request->all());
        return response()->json(compact("quiz"), 200);
    }


    public function destroy(Quiz $quiz)
    {
        try {
            // Use database transaction for added reliability
            DB::transaction(function () use ($quiz) {
                // Optional: Add any related model deletions or cascading logic here
                // For example, delete related records before main model
                // $quiz->relatedModels()->delete();

                $quiz->delete();
            });

            // Return a consistent API response
            return $this->sendSuccess(
                message: 'Registro deletado com sucesso',
                code: Response::HTTP_OK,
                data: [
                    'id' => $quiz->id
                ]
            );
        } catch (ModelNotFoundException $e) {
            // Handle case where model is not found
            return $this->sendError(
                message: 'Registro não encontrado',
                code: Response::HTTP_NOT_FOUND,
                errors: ['not-found' => 'Not Found']
            );
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Erro ao deletar registro: ' . $e->getMessage());

            return $this->sendError(
                message: 'Erro ao processar a exclusão',
                code: Response::HTTP_INTERNAL_SERVER_ERROR,
                errors: ['server' => 'Erro interno do servior']
            );
        }
    }
}
