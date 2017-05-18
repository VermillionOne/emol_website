<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  /*
   * A Project can have many Tasks
   */
  public function tasks()
  {
    return $this->hasMany(Task::class);
  }

  /*
   * A Project can have many Users
   */
  public function users()
  {
    return $this->belongsToMany(User::class);
  }

}
