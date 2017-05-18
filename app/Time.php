<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
  //
  public function users()
  {
    // Client->project
    return $this->belongsTo(user::class);
  }
}
