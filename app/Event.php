<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    //ポストテーブルのリレーション
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
