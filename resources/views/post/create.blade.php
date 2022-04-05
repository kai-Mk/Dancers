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
           .video {
               border:1px solid black;
               margin-top:5px;
               padding:3px;
               background-color:#dbedf0;
               color:black;
           }
           .submit {
               display:inline-block;
               border-radius:20%;
               text-size:18pt;
               text-align:center;
               cursor:pointer;
               padding:12px 12px;
               background:#6666ff;
               color:#ffffff;
               line-height:1em;
               transition:.3s;
               box-shadow:6px 6px 3px #666666;
               boder:2px solid #6666ff;
            }   
            .submit:hover{
                box-shadow:none;
                color:#6666ff;
                background: #ffffff;
            }
        </style>
    </head>
    <body>
        @extends('layouts.app')
        
        @section('content')
        <div class="container">
        
            <div class="create">
                <h2>動画投稿しよう</h2>
                <form method="POST" action="/Dancers/create" enctype="multipart/form-data">
                @csrf 
                    <div class="">
                        <div class="">
                            
                        </div>
                        <div class="">
                            <h4>タイトル：<input class="title" type="text" name="post[title]" placeholder="投稿のタイトルを入力"></h4>
                        </div>
                        @error('post.title')
                            <p style="color:red">{{ $message }}</p>
                        @enderror  
                    </div>    
                    
                    <h4>詳細文：</h4><textarea class="form-control" name="post[main]" placeholder="動画の詳細を入力"></textarea>
                    @error('post.main')
                        <p style="color:red">{{ $message }}</p>
                    @enderror   
                    <h4 class="mt-3">動画の本数</h4>
                    <select name="post[video_quantity]">
                        <opution value="0" selected>0</opution>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <h4 class="mt-4">ジャンルを選択してください</h4>
                    <select name="post[category]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                      
                    <h4 class="mt-4">動画を選択してください（5本以下）</h4> 
                    @error('video_A')
                        <p style="color:red">{{ $message }}</p>
                    @enderror 
                    </br>
                     <input class="video" type="file" name="video_A">
                     </br>
                     <input class="video" type="file" name="video_B">
                     </br>
                     <input class="video" type="file" name="video_C">
                     </br>
                     <input class="video" type="file" name="video_D">
                     </br>
                     <input class="video" type="file" name="video_E">
                    
                    </br>
                    <input class="submit mt-3" type="submit" value="投稿する">
                </form>
                <button class="mt-3" type="button" onclick="location.href='/'">戻る</button>
            </div>
        </div> 
        @endsection
    </body>