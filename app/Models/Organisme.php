<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Courrier;

class Organisme extends Model
{
    protected $fillable = [
        'nom', 'localisation',
    ];

    public function courrier()
    {
     return $this->hasMany('App\Models\Courrier');     
    }
}
