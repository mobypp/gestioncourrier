<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;


class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';


    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'prenom',
        'email',
        'adresse',
        'telephone',
        'password',
        'role_id',
        'photo',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


      //user has one role->role_id
      public function role()
      {
          return $this->belongsTo('App\Models\Role');
      }

      /*
	 *  Helpers
	 *  -------------------------------------------------
	 */

    // public function isAdmin()
    // {
    //     return $this->Role->type == 'Admin';
    // }

    // public function isBO()
    // {
    //     return $this->Role->type == 'BO';
    // }

    // public function isCS()
    // {
    //     return $this->Role->type == 'CS';
    // }

    // public function isCD()
    // {
    //     return $this->Role->type == 'CD';
    // }

    // public function isUF()
    // {
    //     return $this->Role->type == 'UF';
    // }



    /*
     *  Custom Attributes
     *  ---------------------------------------------
     */
    public function getPhotoAttribute()
    {
        if($this->attributes['photo'] == "default.jpg")
        {
            return asset('upload/'.$this->attributes['photo']);
        }else{
            return asset('storage/'.$this->attributes['photo']);
        }
    }
}
