<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\InternshipRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Internship;

class InternshipController extends Controller
{
    /**
     * Récupère tous les stages.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $internships = Internship::all();
        return response()->json($internships);
    }

    /**
     * Récupère un stage spécifique.
     *
     * @param  Internship  $internship
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Internship $internship)
    {
        return response()->json($internship);
    }

    /**
     * Crée un nouveau stage.
     *
     * @param  InternshipRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(InternshipRequest $request)
    {
        $internship = Internship::create($request->validated());
        return response()->json($internship);
    }

    /**
     * Met à jour un stage existant.
     *
     * @param  InternshipRequest  $request
     * @param  Internship  $internship
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(InternshipRequest $request, Internship $internship)
    {
        $internship->update($request->validated());
        return response()->json($internship);
    }

    /**
     * Supprime un stage.
     *
     * @param  Internship  $internship
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Internship $internship)
    {
        $internship->delete();
        return response()->json($internship);
    }
}
