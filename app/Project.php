<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'status'];

    protected $hidden = ['pivot'];

    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')
            ->withPivot('date', 'mark', 'description', 'image', 'long', 'lat');
    }
}
