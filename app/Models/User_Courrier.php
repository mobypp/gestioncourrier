<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_Courrier extends Model
{
    use HasFactory;

    public $table = "user_courrier";

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
