<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'title','address','address_2','city','state','zipcode','phone','email','handle',
  ];

  /*
   * The Client model can have many Projects
   */
  public function projects()
  {
    return $this->hasMany(Project::class);
  }

  /*
   * The Client Model can belong to many Users
   */
  public function users()
  {
    return $this->belongsToMany(User::class);
  }

}
