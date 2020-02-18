<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'roleid', 'first_name', 'last_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /*
    |------------------------
    |     Association
    |------------------------
    */

    public function role(){
        return $this->belongsTo('App\Models\Role','roleid','roleid');
    }

    public function final_interviews(){
        return $this->hasMany('App\Models\FinalInterview','interviewer_id');
    }

    public function interview_histories(){
        return $this->hasMany('App\Models\InterviewHistory','interviewer_id');
    }

    /*
    |------------------------
    |     Custom Helpers
    |------------------------
    */

    public static function interviewers(){
        return self::where('roleid','=',3)->get(); // 3 is the role id of Interviewer
    }

    /*
    |------------------------
    |     Custom Attributes
    |------------------------
    */

    // used to create custom attribute specified inside the bracket
    protected $appends = ['name','role_name'];
    
    public function getNameAttribute(){
        return ucwords(implode(' ', [$this->first_name, $this->last_name]));
    }

    public function getRoleNameAttribute(){
        return $this->role->name;
    }
}
