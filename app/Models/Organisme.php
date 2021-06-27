<?php

namespace App\Models;
use App\Models\Courrier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisme extends Model
{
	use HasFactory;
	
    protected $fillable = [
        'nom', 'localisation',
    ];

    public function courriers()
    {
     return $this->hasMany(Courrier::class);     
    }
}
