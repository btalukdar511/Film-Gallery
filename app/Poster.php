<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{

    protected $uploads = '/images/';

    protected $fillable = [
        'path'
    ];

    public function getFileAttribute($photo)
    {
        return url('/') . $this->uploads . $photo;
    }


    public function film()
    {
        return $this->belongsTo('App\Film');
    }

    public function src(){
        return url('/') . $this->uploads . $this->path;
    }
}
