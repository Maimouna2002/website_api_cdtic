<?php
namespace App\Http\Controllers\Api;

use App\Http\Requests\DomainRequest;
use App\Http\Controllers\Controller;
use App\Models\Domain;

class DomainController extends Controller
{
    /**
     * Récupère tous les domaines.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $domains = Domain::all();
        return response()->json($domains);
    }

    /**
     * Récupère un domaine spécifique.
     *
     * @param  Domain  $domain
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Domain $domain)
    {
        return response()->json($domain);
    }

    /**
     * Crée un nouveau domaine.
     *
     * @param  DomainRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(DomainRequest $request)
    {
        $domain = Domain::create($request->validated());
        return response()->json($domain);
    }

    /**
     * Met à jour un domaine existant.
     *
     * @param  DomainRequest  $request
     * @param  Domain  $domain
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(DomainRequest $request, Domain $domain)
    {
        $domain->update($request->validated());
        return response()->json($domain);
    }

    /**
     * Supprime un domaine.
     *
     * @param  Domain  $domain
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();
        return response()->json($domain);
    }
}
