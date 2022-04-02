<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'main',
        'video_quantity',
        'user_id',
        'video_A',
        'video_B',
        'video_C',
        'video_D',
        'video_E',
        'category_id'
    ];
    
    //コメントテーブルの一対多リレーション
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
    //イベントテーブルの一対多リレーション
    public function events(){
        return $this->hasMany('App\Event');
    }
    
    //ユーザーテーブルの一対多リレーション
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    //カテゴリーテーブルの一対多のリレーション
    public function category(){
        return $this->belongsTo('App\Category');
    }
    
}
