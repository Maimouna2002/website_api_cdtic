<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\OfferRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    /**
     * Récupère toutes les offres.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
      $offers = Offer::with('domain:name')->get();
        return response()->json($offers);
    }

    /**
     * Récupère une offre spécifique.
     *
     * @param  Offer  $offer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Offer $offer)
    {
      $offer->load('domain:name');
        return response()->json($offer);
    }

    /**
     * Crée une nouvelle offre.
     *
     * @param  OfferRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(OfferRequest $request)
    {
        // Crée une nouvelle offre en utilisant les données validées du formulaire
        $offer = Offer::create($request->validated());

        // Retourne la réponse JSON contenant les données de l'offre créée
        return response()->json($offer);
    }

    /**
     * Met à jour une offre existante.
     *
     * @param  OfferRequest  $request
     * @param  Offer  $offer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(OfferRequest $request, Offer $offer)
    {
        // Met à jour l'offre en utilisant les données validées du formulaire
        $offer->update($request->validated());

        // Retourne la réponse JSON contenant les données de l'offre mise à jour
        return response()->json($offer);
    }

    /**
     * Supprime une offre.
     *
     * @param  Offer  $offer
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Offer $offer)
    {
        // Supprime l'offre
        $offer->delete();

        // Retourne la réponse JSON contenant les données de l'offre supprimée
        return response()->json($offer);
    }
}
