<?php

namespace App\Models;
use App\Models\Courrier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   
    protected $table = 'users';


	/*
	 *  Relationships
	 *  ----------------------------------------------
	 */

	public function courriers()
	{
		return $this->belongsToMany(Courrier::class, 'user_courrier', 'user_id')
		->withPivot(['accepted_at', 'validated_at','finished_at']);
	}
}
