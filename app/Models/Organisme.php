<?php

namespace App\Models;
use App\Models\Courrier;


use Illuminate\Database\Eloquent\Model;

class Organisme extends Model
{
    protected $fillable = [
        'organisme', 'localisation',
    ];

    public function courrier()
    {
     return $this->hasMany(Courrier::class);     
    }
}
