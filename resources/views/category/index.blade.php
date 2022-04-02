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
            .post {
                text-align:center;
            }  
            
            button {
                 border-radius: 5px;
            }
            
            .post-nav {
                display: flex;
                list-style:none;
                justify-content: flex-end;
            }
            
            
            .delete {
                background-color:#f10000;
                color:#ffffff;
                font-size:12pt;
                margin-right: 5px;
                border-radius:20%;
                box-shadow:5px 5px 8px #666666;
                padding:8px 15px;
            }
            
            .show {
                display:inline-block;
                border-radius:20%;
                font-size:12pt;
                text-align:center;
                cursor:pointer;
                padding:14px 15px;
                background:#6666ff;
                color:#ffffff;
                line-height:1em;
                opacity:1;
                transition:.3s;
                box-shadow:6px 6px 9px #666666;
            }
            
            
            
        </style>
    </head>
    <body>
        @extends('layouts.app')
        
        @section('content')
        <div class="main container">
            <div class="page-header">
                
                <button type="button"onclick="location.href='/Dancers/create'" class="index_page">動画共有する</button>
               
            </div>
            <div class="nav-header">
               
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="/Dancers" class="index_page nav-link">投稿一覧へ</a>
                        </li>
                       @foreach($posts as $post)
                      <li class="nav-item">
                        <a class="nav-link category" href="/Dncers/category/{{ $post->category->id }}">{{ $post->category->category_name }}</a>
                      </li>
                      @endforeach 
                    </ul>
                   
            </div>
            
            <div class="index mt-3">
                
                <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 15%">投稿者</th>
                                    <th scope="col" style="width: 15%">タイトル</th>
                                    <th scope="col" style="width: 30%">動画詳細</th>
                                    <th scope="col" style="width: 15%">詳細ページへ</th>
                                    <th scope="col" style="width: 15%">削除</th>
                                </tr>
                            </thead>
                            
                            
                    @foreach ($posts as $post)
                        
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        @if($user->id == $post->user_id)
                                            <h3 class="name text-left ">{{ $post->user->name }}</h4>
                                        @endif
                                    </th>
                                    <td><h4>{{ $post->title }}</h4></td>
                                    <td><p>{{ $post->main }}</p></td>
                                    <td>
                                       <button class="show" type="button" onclick="location.href='/Dancers/{{ $post->id }}'">詳細へ</button> 
                                    </td>
                                    <td>
                                        <form method="POST" action="/Dancers/{{ $post->id }}" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete" id="delete" onclick="return checkDelete()">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                    @endforeach        
                </table>
                  {{ $posts->links() }} 
                        
                
            </div>    
        </div>    
        <script>
            function checkDelete() {
                var res =confirm('削除しますか？');
                      if (res == true){
                          return true;
                      } else {
                          return false;
                      }
                  }
        </script>
         @endsection
    </body>
