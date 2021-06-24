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
     'id' ,'service','division'
       
   ];

   //service has one division->div-id

   public function division()
   {
    return $this->belongsTo('App\Models\Division');

    //    return $this->belongsTo('App\Models\Division');
   }
//    //user has one role->role_id
//    public function role()
//    {
//        return $this->belongsTo(Role::class);
//    }
}