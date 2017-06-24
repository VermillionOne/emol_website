<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

  /**
   * All of the relationships to be touched.
   *
   * @var array
   */
  protected $touches = ['project'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'project_id','title','handle','due_date',
  ];

  /*
   * A Project can have many Times
   */
  public function times()
  {
    return $this->hasMany(Time::class);
  }

  /*
   * A Task can have many Users
   */
  public function users()
  {
    return $this->belongsToMany(User::class);
  }

  /*
   * A Task belongs to/can have only one Project
   */
  public function project()
  {
    return $this->belongsTo(Project::class);
  }

}
