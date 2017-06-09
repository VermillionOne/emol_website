<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    * A User can have many Projects
    */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    /*
    * A User can have many Tasks
    */
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

   /*
    * A User can have many Clients
    */
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

}
