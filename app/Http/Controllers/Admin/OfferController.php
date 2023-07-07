<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Domain;
use App\Models\Level;
use App\Models\TypeOffer;
use App\Http\Requests\OfferRequest;

class OfferController extends Controller
{
    /**
     * Affiche une liste des offres.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::with('domain', 'typeOffer')->orderBy('id', 'desc')->get();

        return view('content.offers.index', compact('offers'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle offre.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        $domains = Domain::all();
        $typeOffers = TypeOffer::all();

        return view('content.offers.create', compact('domains', 'typeOffers', 'levels'));
    }

    /**
     * Enregistre une nouvelle offre.
     *
     * @param  \App\Http\Requests\OfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
        $validatedData = $request->validated();

        $offer = Offer::create($validatedData);
        $offer->levels()->sync($request->input('levels'));

        return redirect()->route('offers.index')->with('success', 'L\'offre a été créée avec succès.');
    }

    /**
     * Affiche les détails d'une offre spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offer::with('domain', 'typeOffer', 'levels')->findOrFail($id);

        return view('content.offers.show', compact('offer'));
    }

    /**
     * Compte le nombre d'offres.
     *
     * @return int
     */
    public function count()
    {
        // Compter le nombre d'offres
        $nombreOffres = Offer::count();

        // Retourner le nombre d'offres
        return $nombreOffres;
    }

    /**
     * Affiche le formulaire d'édition d'une offre spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::with('domain', 'typeOffer', 'levels')->findOrFail($id);
        $levels = Level::all();
        $typeOffers = TypeOffer::all();
        $domains = Domain::all();

        return view('content.offers.edit', compact('offer', 'levels', 'typeOffers', 'domains'));
    }

    /**
     * Met à jour une offre spécifique dans la base de données.
     *
     * @param  \App\Http\Requests\OfferRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, $id)
    {
        $offer = Offer::findOrFail($id);

        $validatedData = $request->validated();

        $offer->update($validatedData);
        $offer->levels()->sync($request->input('levels'));

        return redirect()->route('offers.index')->withSuccess(__('Offer Updated Successfully.'));
    }
    public function status($id, $status)
    {
        Offer::findOrFail($id)->update(['status' => $status]);

        return redirect()->route('offers.index')->withSuccess(__('Status Updated Successfully.'));
    }

    /**
     * Supprime une offre spécifique de la base dedonnées.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect()->route('offers.index')->withSuccess(__('Offer Deleted Successfully.'));
    }
}
