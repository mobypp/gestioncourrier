<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Service;

class Division extends Model
{
    use HasFactory;
    protected $table ="divisions";
    //protected $fllable=['nomDivison'];

    //public function services(){
        //return $this->hasMany(Service::class);
    //}
}