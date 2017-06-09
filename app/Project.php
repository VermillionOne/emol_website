<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

  /**
   * All of the relationships to be touched.
   *
   * @var array
   */
  protected $touches = ['users', 'client'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'client_id','title','projected_cost','current_cost','planned_hours','worked_hours','deadline_date','hourly_rate','handle'
  ];

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

  /*
   * A Project belongs to/can have only one Client
   */
  public function client()
  {
    return $this->belongsTo(Client::class);
  }

}
