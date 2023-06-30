<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ApplicationRequest;
use App\Http\Controllers\Controller;
use App\Models\Application;

class ApplicationController extends Controller
{
    /**
     * Récupère toutes les candidatures.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $applications = Application::all();
        return response()->json($applications);
    }

    /**
     * Récupère une candidature spécifique.
     *
     * @param  Application  $application
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Application $application)
    {
        return response()->json($application);
    }

    /**
     * Crée une nouvelle candidature.
     *
     * @param  ApplicationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ApplicationRequest $request)
    {
        $application = Application::create($request->validated());
        return response()->json($application);
    }

    /**
     * Met à jour une candidature existante.
     *
     * @param  ApplicationRequest  $request
     * @param  Application  $application
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ApplicationRequest $request, Application $application)
    {
        $application->update($request->validated());
        return response()->json($application);
    }

    /**
     * Supprime une candidature.
     *
     * @param  Application  $application
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return response()->json($application);
    }
}
