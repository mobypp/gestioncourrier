<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Organisme;

class Courrier extends Model
{
    protected $table = 'courriers';


    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'matricule', 'titre', 'organisme_id', 'objet', 'file', 'contenu', 'etat', 'image',
    ];

    //courrier has one organisme->org-id

   public function organisme()
   {
    return $this->belongsTo('App\Models\Organisme');

   }
}
