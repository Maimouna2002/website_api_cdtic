<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeOffer;

class TypeOfferController extends Controller
{
    /**
     * Affiche une liste des types d'offres.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeOffers = TypeOffer::orderBy('id', 'desc')->get();

        return view('content.type-offers.index', compact('typeOffers'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau type d'offre.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.type-offers.create');
    }

    /**
     * Enregistre un nouveau type d'offre.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        TypeOffer::create($request->all());

        return redirect()->route('type-offers.index')->withSuccess(__('New Type Offer Added Successfully.'));
    }

    /**
     * Affiche les détails d'un type d'offre spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeOffer = TypeOffer::findOrFail($id);

        return view('content.type-offers.show', compact('typeOffer'));
    }

    /**
     * Affiche le formulaire d'édition d'un type d'offre spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeOffer = TypeOffer::findOrFail($id);

        return view('content.type-offers.edit', compact('typeOffer'));
    }

    /**
     * Met à jour un type d'offre spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $typeOffer = TypeOffer::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
        ]);

        $typeOffer->update($request->all());

        return redirect()->route('type-offers.index')->withSuccess(__('Type Offer Updated Successfully.'));
    }

    /**
     * Supprime un type d'offre spécifique de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeOffer = TypeOffer::findOrFail($id);
        $typeOffer->delete();

        return redirect()->route('type-offers.index')->withSuccess(__('Type Offer Deleted Successfully.'));
    }
}
