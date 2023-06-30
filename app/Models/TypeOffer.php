<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOffer extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
  ];
  public function offers()
  {
      return $this->hasMany(Offer::class, 'type_offer_id');
  }
}
