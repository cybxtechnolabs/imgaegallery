<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gallery;

class Image extends Model
{
    protected $fillable = [
        'name', 'gallery_id', 'path'
    ];

    //Relation to Topics
    public function galleries()
    {
        return $this->belongsTo('App\Gallery', 'gallery_id');
    }
}
