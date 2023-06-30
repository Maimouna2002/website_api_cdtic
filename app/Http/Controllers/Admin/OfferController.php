<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Domain;
use App\Models\Level;
use App\Models\TypeOffer;
use Laratrust;

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
       // Vérifier si l'utilisateur a le rôle d'administrateur

        $levels = Level::all();
        $domains = Domain::all();
        $typeOffers = TypeOffer::all();

        return view('content.offers.create', compact('domains', 'typeOffers', 'levels'));
    }

    /**
     * Enregistre une nouvelle offre.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'domain_id' => 'required',
            'type_offer_id' => 'required',
            'description' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'available_places' => 'required|numeric',
            'levels' => 'required|array',
            'levels.*' => 'exists:levels,id',
            'status' => 'required'
        ]);

        $offer = Offer::create($validatedData);
        $offer->levels()->sync($request->input('levels'));

        return redirect()->route('offers.index')->with('success', 'L\'offre a été créée avec succès.');
    }

 /**
     * Change the status for editing the specified resource.
     *
      */

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

    public function status($id, $status)
    {
        Offer::findOrFail($id)->update(['status' => $status]);

        return redirect()->route('offers.index')->withSuccess(__('Status Updated Successfully.'));
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


        return view('content.offers.edit', compact('offer', 'levels', 'typeOffers','domains'));
    }

    /**
     * Met à jour une offre spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);

        $validatedData = $request->validate([
            'domain_id' => 'required',
            'type_offer_id' => 'required',
            'description' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'available_places' => 'required|numeric',
            'levels' => 'required|array',
            'levels.*' => 'exists:levels,id',
            'status' => 'required'
        ]);

        $offer->update($validatedData);
        $offer->levels()->sync($request->input('levels'));

        return redirect()->route('offers.index')->withSuccess(__('Offer Updated Successfully.'));
    }

    /**
     * Supprime une offre spécifique de la base de données.
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
