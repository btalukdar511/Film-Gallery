<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        return asset('storage/images/'.urlencode($this->path));
//        return url('/').Storage::url('images/'.$this->path);
    }

    public function local(){
        return public_path() . $this->uploads . $this->path;
    }


    public function delete()
    {
        if(file_exists($this->local())){
            unlink($this->local());
        }

        return parent::delete();
    }
}
