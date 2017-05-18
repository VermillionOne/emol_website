<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  //
  public function times()
  {
    // Client->project
    return $this->hasMany(time::class);
  }

  /*
   * A Task can have many Users
   */
  public function users()
  {
    return $this->belongsToMany(User::class);
  }

}
