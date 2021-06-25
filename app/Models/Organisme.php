<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisme extends Model
{
    protected $fillable = [
        'organisme', 'localisation',
    ];

    public function courrier()
    {
     return $this->hasMany('App\Models\Courrier');     
    }
}
