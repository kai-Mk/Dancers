<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Comment;
use App\User;
use App\Category;
use Storage;
use Auth;


class PostController extends Controller
{
    //一覧画面の表示
    public function index(Post $post, User $user, Category $category){
        $user = Auth::user();
        return view('post.index')->with(['posts'=>$post->simplePaginate(10)])->with(['user'=>$user])->;
    }
    
    //詳細画面の表示
    public function show(Post $post, Comment $comment){
        return view('post.show')->with(['post' => $post])->with(['comments'=>$comment->get()]);
    }
    
    //投稿画面の表示
    public function create(User $user, Category $category){
        return view('post.create')->with(['user'=>$user])->with(['categories'=>$category->get()]);
    }
    
    //動画詳細と動画の登録
    public function store(PostRequest $request, Post $post, User $user){
        //ポストテーブルのデータ保存
        $input = $request['post'];
        $post->title = $input['title'];
        $post->main = $input['main'];
        $post->video_quantity = $input['video_quantity'];
        $post->user_id = Auth::id();
        $post->category_id = $input['category'];
        
        //ビデオ保存
        $video_A = $request->file('video_A');
        $path = Storage::disk('s3')->putFile('dancers', $video_A, 'public');
        $post->video_A = Storage::disk('s3')->url($path);
        
        if($request->file('video_B') != null){
            $video_B = $request->file('video_B');
            $path = Storage::disk('s3')->putFile('dancers', $video_B, 'public');
            $post->video_B = Storage::disk('s3')->url($path);
        }
        
        if($request->file('video_C') != null){
            $video_C = $request->file('video_C');
            $path = Storage::disk('s3')->putFile('dancers', $video_C, 'public');
            $post->video_C = Storage::disk('s3')->url($path);
        }
        
        if($request->file('video_D') != null){
            $video_D = $request->file('video_C');
            $path = Storage::disk('s3')->putFile('dancers', $video_D, 'public');
            $post->video_D = Storage::disk('s3')->url($path);
        }
        
        if($request->file('video_E') != null){
            $video_E = $request->file('video_E');
            $path = Storage::disk('s3')->putFile('dancers', $video_E, 'public');
            $post->video_E = Storage::disk('s3')->url($path);
        }
        
        $post->save();
        
       
        
        
        return redirect('/Dancers/' . $post->id);
    }
    
    //更新画面の表示
    public function edit(Post $post){
        return view('post.edit')->with(['post' => $post]);
    }
    
    //更新情報の登録
    public function update(Request $request, Post $post){
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/Dancers/' . $post->id);
    }
    
    //投稿の削除
    public function delete(Post $post){
        $post->delete();
        return redirect('/Dancers');
    }
    
    //ジャンル別の投稿画面の表示
    public function category(Category $category, User $user){
        
        $user = Auth::user();
        return view('category.index')->with(['posts'=>$category->getByCategory()])->with(['user'=>$user])
        ;
        
    }
    
    //カレンダー表示
    public function calendar(){
        return view('post.calendar');
    }
}
