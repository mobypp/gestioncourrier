<?php

namespace App\Models;
use App\Models\Courrier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	use HasFactory;
	
    protected $fillable = [
        'id', 'nom', 'chemin', 'extension','courrier_id',
    ];

   public function courrier()
   {
    return $this->belongsTo(Courrier::class);     
   }
}
