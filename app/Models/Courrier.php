<?php

namespace App\Models;
use App\Models\Organisme;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
	use HasFactory;
	
    protected $fillable = [
        'id', 'matricule', 'titre', 'destination', 'objet', 'file', 'contenu', 'etat', 'image',
    ];

    //courrier has one organisme->org-id

   public function organisme()
   {
    return $this->belongsTo(Organisme::class);     
   }
}
