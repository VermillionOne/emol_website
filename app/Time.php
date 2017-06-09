<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{

  /**
   * All of the relationships to be touched.
   *
   * @var array
   */
  protected $touches = ['user','task'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'task_id','user_id','time_span','value','title','handle',
  ];

  /*
   * A Time belongs to one User
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /*
   * A time belongs to one Task
   */
  public function task()
  {
    return $this->belongsTo(Task::class);
  }

}
