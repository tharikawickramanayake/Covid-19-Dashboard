<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'path',
        'user_id'
    ];

    protected $filepath = '/storage/images/profile/';

    public function getPathAttribute($value){

        if(is_null($value)){
            return '/storage/images/defaults/user_default.png';
        }else{
            
            return ($this->filepath . $value);
        }

    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
