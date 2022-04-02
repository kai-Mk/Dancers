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
        
        </style>
    </head>
    <body>
        @extends('layouts.app')
        
        @section('content')
        <div class="container">
            <h2>コメントを投稿しよう</h2>
            <form method="POST" action="/Dancers/comment/create">
            @csrf 
                <input value="{{ $post->id }}" type="hidden" name="comment[post_id]" >
                <h4>name</h4>
                <input class="mt-3" type="text" name="comment[name]" placeholder="名前を入力してください">
                @error('comment.name')
                    <p style="color:red">{{ $message }}</p>
                 @enderror  
                </br>
                <h4>comment</h4>
                <textarea class="mt-3" name="comment[comment]" placeholder="コメントを入力してください"></textarea>
                @error('comment.comment')
                    <p style="color:red">{{ $message }}</p>
                 @enderror 
                </br>
                <input type="submit" value="送信">
            </form>
            <a href="/Dancers/{{ $post->id }}">戻る</a>
        </div>    
        @endsection
    </body>