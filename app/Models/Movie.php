<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Director;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Rating;

class Movie extends Model
{
    //
    // protected $table = 'movie';
    protected $primaryKey = 'mov_id';
    public $incrementing = false;
    public $timestamps = false;

    public function directors(){
        return $this->belongsToMany(Director::class, 'dir_id');
    }

    public function actrors(){
        return $this->belongsToMany(Actor::class, 'mov_id', 'act_id');
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'mov_id', 'gen_id');
    }

    public function ratings(){
        return $this->hasMany(Rating::class, 'mov_id');
    }

}
