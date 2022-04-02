<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dancers</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
             button {
                 border-radius: 5px;
            }
        </style>
    </head>
    <body>
        @extends('layouts.app')
        
        @section('content')
        <div class="container">
            
            <div class="page-header">
                   <button type="button"onclick="location.href='/Dancers'" class="index_page">投稿一覧へ</button>
                    <button type="button"onclick="location.href='/Dancers/create'" class="index_page">動画共有する</button>
            </div> 
            <div class="detail">
                <div class="text mt-3">
                    <button type="button" onclick="location.href='/Dancers/edit/{{ $post->id }}'">編集する</button>
                    <h5 class="mt-3"><投稿者></h5>
                    <h2>{{ $post->user->name }}</h2>
                    <h5 class="mt-3"><ジャンル></h5>
                    <h3>{{ $post->category->category_name }}</h3>
                    <h3><タイトル></h3>
                    <h4>{{ $post->title }}</h4>
                    <h3><詳細文></h3>
                    <p>{{ $post->main }}</p>
                </div>
                <div class="videos ">
                     <div class="container-fluid">
                        <div class="row flex-nowrap">
                            <div class="col-5">
                                <div class="card">
                                    <video controls>
                                        <source src={{ $post->video_A }} type="video/mp4">
                                    </video>
                                </div>
                            </div>
                             @if($post->video_B != null)
                                 <div class="col-5">
                                    <div class="card">
                                        <video controls>
                                            <source src={{ $post->video_B }} type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                             @endif
                             @if($post->video_C != null)
                                <div class="col-5">
                                    <div class="card">
                                        <video controls>
                                            <source src={{ $post->video_C }} type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            @endif  
                            @if($post->video_D != null)
                                <div class="col-5">
                                    <div class="card">
                                        <video controls>
                                            <source src={{ $post->video_D }} type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            @endif
                            @if($post->video_E != null)
                                <div class="col-5">
                                    <div class="card">        
                                        <video controls>
                                            <source src={{ $post->video_E }} type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            @endif    
                        </div>
                    </div>        
                </div>
                <div class="comment">
                    <h2>コメント一覧</h2>
                    <button  type="button" onclick="location.href='/Dancers/{{ $post->id }}/comment/create'">コメントする</button>
                    <table class="table mt-2">
                                <thead>
                                    <tr>
                                      <th scope="col">名前</th>
                                      <th scope="col">コメント</th>
                                      <th scope="col">削除</th>
                                    </tr>
                                </thead>
                    
                        @foreach ($comments as $comment)
                            @if($post->id == $comment->post_id)
                                
                                
                                    <tbody>
                                         <tr>
                                              <th scope="row">{{ $comment->name }}</th>
                                              <td>{{ $comment->comment }}</td>
                                              <td>
                                                  <form method="POST" action="/Dancers/{{ $comment->id }}/comment">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete" onclick="return checkDelete()">削除</button>
                                                　</form>
                                              </td>
                                         </tr>
                                    </tbody>     
                            @endif
                        @endforeach     
                                
                    </table>    
                       
                    
                    
                    
                    
                    
                </div>
                <div class="calender">
                    <button class="mt-3" type="button" onclick="location.href='/Dancers/calendar/{{ $post->id }}'">日程調整をする</button>
                </div>
            </div>
            
            <button class="mt-3" type="button" onclick="location.href='/Dancers/'">戻る</button>
        </div>
        <script>
            function checkDelete() {
                var res =confirm('コメントを削除しますか？');
                      if (res == true){
                          return true;
                      } else {
                          return false;
                      }
                  }
        </script>
        @endsection
    </body>