<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Division;

   
class Service extends Model
{
    use HasFactory;
    protected $table ="services";

    protected $primaryKey = 'id';

    protected $fillable = [
     'id' ,'nom','division_id'
       
   ];

   //service has one division->div-id

   public function division()
   {
    return $this->belongsTo('App\Models\Division');     
   }

   public function users()
   {
       return $this->hasMany('App\Models\User');
   }
 
}