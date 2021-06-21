<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    // protected $appends = ['name', ];


    /*
     *  RelationShips
     *  --------------------------------------------
     */

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
	/**
	 *  Get users that have this role
	 */
    

    public function getNameAttribute()
    {
    	switch ($this->nom)
	    {
		    case 'Admin': return 'Admin OU Assistant'; break;
		    case 'BO': return 'Bureau D ordere'; break;
		    case 'CS': return 'Chef de service'; break;
		    case 'CD': return 'Chef de Division'; break;
		    case 'UF': return 'Employée'; 
	    }
    }
}
