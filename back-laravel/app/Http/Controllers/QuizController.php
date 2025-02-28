<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class QuizController extends Controller
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
        $cargo = Quiz::create($request->all());

        // retornar os dados 
        return response()->json(compact('cargo'), 201);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete($quiz);
        return response()->json([
            "message" => "cargo deletado com sucesso",
        ], 200);
    }
}
