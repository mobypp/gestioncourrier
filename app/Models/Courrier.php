<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    protected $fillable = [
        'id', 'matricule', 'titre', 'destination', 'objet', 'file', 'contenu', 'etat', 'image',
    ];

    //courrier has one organisme->org-id

   public function organisme()
   {
    return $this->belongsTo(Organisme::class);     
   }
}
