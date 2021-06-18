<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table ="services";
   // protected $fillable=['service','division'];
   
    protected $service =['deleted_at']; }

    //public function division(){
      //  return $this->belongsTo(Division::class);}
