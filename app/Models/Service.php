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
<<<<<<< HEAD
     'id' ,'service','division'
       
   ];

   //service has one division->div-id

   public function division()
   {
    return $this->belongsTo('App\Models\Division');

    //    return $this->belongsTo('App\Models\Division');
=======
      'service','division' ,
       
   ];

   public function chaymae()
   {
       return $this->belongsTo('App\Models\Division' ,'division');
>>>>>>> 5e22763a5b024ac2d1a0bfd92ecb38e24c88e992
   }
//    //user has one role->role_id
//    public function role()
//    {
//        return $this->belongsTo(Role::class);
//    }
}