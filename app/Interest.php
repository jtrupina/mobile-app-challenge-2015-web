<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'interests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tag'];

    protected $hidden = ['pivot'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
