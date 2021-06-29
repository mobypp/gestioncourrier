<?php

namespace App\Models;

use App\Models\Organisme;
use App\Models\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Courrier extends Model
{
    protected $table = 'courriers';


    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'matricule', 'titre', 'organisme_id', 'objet', 'file', 'contenu', 'etat',
    ];

    protected $appends = ['assigned_user'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //courrier has one organisme->org-id

  
    /*
     *  RelationShips
     *  ---------------------------------------------
     */
    public  function users()
    {
        return $this->belongsToMany(User::class,'user_courrier');
    }
    public function organisme()
    {
        return $this->belongsTo('App\Models\Organisme');
    }

    public function ActiveUser()
    {
        return $this->AssignedUser()->where('user_courrier.accepted_at', '!=', 
        Carbon::now())->whereNull('user_courrier.finished_at');
    }
    //user who assigned to the courrier and still not start or finished it
    public function AssignedUser()
    {
        return $this->belongsToMany('App\Models\User')
            ->whereNotNull('user_courrier.created_at')->whereNull('user_courrier.deleted_at');
    }
    //courrier qui passe bien et valider 'test pour la validation ==>AuthserviceProvider
    public function FinishedUser()
    {
        return $this->belongsToMany('App\Models\User')->wherePivot('created_at', '!=', NULL)
            ->wherePivot('accepted_at', '!=', NULL)
            ->wherePivot('validated_at', '!=', NULL)
            ->wherePivot('finished_at', '!=', NULL)
            ->wherePivot('deleted_at', NULL);
    }
    public function Start()
    {
        return $this->belongsToMany('App\Models\User')->wherePivot('created_at', '!=', NULL)
            ->wherePivot('accepted_at', '!=', NULL)
            ->wherePivot('deleted_at', NULL);
    }
    public function Finish()
    {
        return $this->belongsToMany('App\Models\User')->wherePivot('created_at', '!=', NULL)
            ->wherePivot('accepted_at', '!=', NULL)
            ->wherePivot('validated_at', '!=', NULL)
            ->wherePivot('finished_at', '!=', NULL)
            ->wherePivot('deleted_at', NULL);
    }
    /*  /* Access view for employee CD and CS and BO **/

    public function userfinal()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function CD()
    {
        $role_cd = Role::where('nom', 'CD')->first();
        return $this->belongsTo('App\Models\User')->where('role_id', $role_cd->id);

        //        return $this->belongsTo('App\User', 'employee_id');
    }

    public function CS()
    {
        $role_cs = Role::where('nom', 'CS')->first();

        return $this->belongsTo('App\Models\User')->where('role_id', $role_cs->id);
    }
    public function BO()
    {
        $role_bo = Role::where('nom', 'BO')->first();

        return $this->belongsTo('App\Models\User')->where('role_id', $role_bo->id);
    }
    // 

    public function getAssignedUserAttribute()
    {
    	return $this->AssignedUser()->first();
    }
//    public function organisme()
//    {
//     return $this->belongsTo(Organisme::class);     
//    }

   public function files()
   {
    return $this->hasMany(File::class);     
   }
}
