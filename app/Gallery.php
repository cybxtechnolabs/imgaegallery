<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\User;

class Gallery extends Model
{
    protected $fillable = [
        'name', 'user_id', 'slug'
    ];

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    //Relation to Topics
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
