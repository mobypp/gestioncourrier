<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Courrier;

class Organisme extends Model
{
	use HasFactory;
	
    protected $fillable = [
        'nom', 'localisation',
    ];

    public function courriers()
    {
     return $this->hasMany('App\Models\Courrier');     
    }
}
