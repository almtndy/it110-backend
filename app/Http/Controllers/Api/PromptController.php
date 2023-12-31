<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Prompt;
use App\Http\Controllers\Controller;
use App\Http\Requests\PromptRequest;

class PromptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Prompt::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PromptRequest $request)
    {
        $validated = $request->validated();
        $prompt = Prompt::create($validated);
        return $prompt;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Prompt::findOrFail($id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prompt = Prompt::findOrFail($id);
        $prompt->delete();

        return $prompt;
    }
}
