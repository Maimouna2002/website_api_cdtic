<?php

namespace App\Http\Controllers\Personnal;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Domain;
use App\Models\Level;
use App\Models\TypeOffer;
class OfferController extends Controller
{
  public function create()
  {
     // Vérifier si l'utilisateur a le rôle d'administrateur

      $levels = Level::all();
      $domains = Domain::all();
      $typeOffers = TypeOffer::all();

      return view('content.offers.create', compact('domains', 'typeOffers', 'levels'));
  }
}
