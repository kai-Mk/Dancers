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
            
             .delete:hover{
                box-shadow:none;
            }
            
            .show {
                display:inline-block;
                border-radius:20%;
                font-size:12pt;
                text-align:center;
                cursor:pointer;
                padding:14px 15px;
                background:#333333;
                color:#ffffff;
                line-height:1em;
                opacity:1;
                transition:.3s;
                box-shadow:6px 6px 9px #666666;
            }
            
            .show:hover{
                box-shadow:none;
            }
            
            .category {
                color:red;
                font-size:2em;
            }
            
            .create {
                display:inline-block;
                border-radius:14%;
                font-size:17pt;
                text-align:center;
                cursor:pointer;
                padding:14px 14px;
                background:rgba(102, 102, 255, 0.76);
                color:#ffffff;
                line-height:1em;
                opacity:1;
                transition:.3s;
                box-shadow:4px 4px 16px #666666;
            }
            
            .create:hover {
                box-shadow:none;
                opacity:0.8;
            }
            
        </style>
    </head>
    <body>
        @extends('layouts.app')
        
        @section('content')
        <div class="main container">
            <div class="page-header">
                <button type="button"onclick="location.href='/Dancers/create'" class="create">動画共有する</button>
               
            </div>
            <div class="nav-header mt-3">
               
                    <ul class="nav nav-tabs">
                      @foreach($categories as $category)
                          <li class="nav-item border">
                            <a class="nav-link category" href="/Dncers/category/{{ $category->id }}">{{ $category->category_name }}</a>
                          </li>
                      @endforeach  
                    </ul>
                   
            </div>
            
            <div class="index mt-3">
                <h2>投稿一覧</h2>
                
                <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 15%">投稿者</th>
                                    <th scope="col" style="width: 15%">タイトル</th>
                                    <th scope="col" style="width: 30%">動画詳細</th>
                                    <th scope="col" style="width: 15%">詳細ページへ</th>
                                    <th scope="col" style="width: 10%">削除</th>
                                    <th scope="col" style="wudth: 15%">ジャンル</th>
                                </tr>
                            </thead>
                    @foreach ($posts as $post)
                        
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        @if($user->id == $post->user_id)
                                            <h4 class="name text-left ">{{ $post->user->name }}</h4>
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
                                    <td>
                                        <p>{{ $post->category->category_name }}</p>
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
