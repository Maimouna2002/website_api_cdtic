<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TypeOfferRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeOffer;

class TypeOfferController extends Controller
{
    /**
     * Récupère tous les types d'offres.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $typeOffers = TypeOffer::all();
        return response()->json($typeOffers);
    }

    /**
     * Récupère un type d'offre spécifique.
     *
     * @param  TypeOffer  $typeOffer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(TypeOffer $typeOffer)
    {
        return response()->json($typeOffer);
    }

    /**
     * Crée un nouveau type d'offre.
     *
     * @param  TypeOfferRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeOfferRequest $request)
    {
        $typeOffer = TypeOffer::create($request->validated());
        return response()->json($typeOffer);
    }

    /**
     * Met à jour un type d'offre existant.
     *
     * @param  TypeOfferRequest  $request
     * @param  TypeOffer  $typeOffer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TypeOfferRequest $request, TypeOffer $typeOffer)
    {
        $typeOffer->update($request->validated());
        return response()->json($typeOffer);
    }

    /**
     * Supprime un type d'offre.
     *
     * @param  TypeOffer  $typeOffer
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(TypeOffer $typeOffer)
    {
        $typeOffer->delete();
        return response()->json($typeOffer);
    }
}
