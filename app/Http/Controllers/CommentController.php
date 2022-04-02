<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    //コメント投稿画面
    public function commentCreate(Post $post){
        return view('comment.create')->with(['post' => $post]);
    }
    
    //コメント登録
    public function commentStore(CommentRequest $request, Comment $comment, Post $post){
        $input_comment = $request['comment'];
        $comment->fill($input_comment)->save();
        return redirect('/Dancers/' . $comment->post_id);
    }
    
    public function test(Comment $comment, Post $post){
        $test = $post->find(5)->comments()->get();
        dd($test);
    }
    
    //コメント削除
    public function delete(Comment $comment){
        $comment->delete();
        return redirect('/Dancers/' .$comment->post_id);
    }
}
