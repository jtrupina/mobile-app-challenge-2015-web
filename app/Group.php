<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
