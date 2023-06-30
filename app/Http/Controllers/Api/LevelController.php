<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LevelRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    /**
     * Récupère tous les niveaux.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $levels = Level::all();
        return response()->json($levels);
    }

    /**
     * Récupère un niveau spécifique.
     *
     * @param  Level  $level
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Level $level)
    {
        return response()->json($level);
    }

    /**
     * Crée un nouveau niveau.
     *
     * @param  LevelRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(LevelRequest $request)
    {
        $level = Level::create($request->validated());
        return response()->json($level);
    }

    /**
     * Met à jour un niveau existant.
     *
     * @param  LevelRequest  $request
     * @param  Level  $level
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(LevelRequest $request, Level $level)
    {
        $level->update($request->validated());
        return response()->json($level);
    }

    /**
     * Supprime un niveau.
     *
     * @param  Level  $level
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Level $level)
    {
        $level->delete();
        return response()->json($level);
    }
}
