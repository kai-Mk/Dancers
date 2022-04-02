<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //ポストテーブルのリレーション
    public function post(){
        return $this->belongsTo('App\Post');
    }
    
     protected $fillable = [
        'name',
        'comment',
        'post_id'
        
        
    ];
}
