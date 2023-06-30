<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Internship extends Model
{
    protected $fillable = ['application_id', 'report_file', 'status'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}

