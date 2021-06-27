<?php

namespace App\Models;
use App\Models\Organisme;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
