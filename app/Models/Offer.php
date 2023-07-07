<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Offer extends Model
{
    protected $with = ['domain','typeOffer','levels'];
    protected $fillable = [
        'type_offer_id',
        'domain_id',
        'description',
        'date_start',
        'date_end',
        'available_places',
        'status',
    ];

    public function levels()
{
    return $this->belongsToMany(Level::class, 'level_offer');
}

public function user()
{
    return $this->belongsToMany(User::class, 'application');
}

    public function typeOffer()
    {
        return $this->belongsTo(TypeOffer::class);

    }

    public function domain()
    {
        return $this->belongsTo(domain::class);
    }
}
