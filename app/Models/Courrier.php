<?php

namespace App\Models;
use App\Models\Organisme;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
	use HasFactory;
	
    protected $fillable = [
        'id', 'matricule', 'titre', 'organisme_id', 'objet', 'file', 'contenu', 'etat',
    ];

    //courrier has one organisme->org-id

   public function organisme()
   {
    return $this->belongsTo(Organisme::class);     
   }

   public function files()
   {
    return $this->hasMany(File::class);     
   }
}
