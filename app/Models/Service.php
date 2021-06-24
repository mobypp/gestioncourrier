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

    //protected $primaryKey = 'id';

    protected $fillable = [
      'service','division' ,
       
   ];

   public function chaymae()
   {
       return $this->belongsTo('App\Models\Division' ,'division');
   }
   
}