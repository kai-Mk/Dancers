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
         <div class="edit container">
            <h2>情報の編集</h2>
            <form method="POST" action="/Dancers/{{ $post->id }}">
            @csrf
            @method('PUT')
                <h3>タイトル：</h3>
                <input type="text" name="post[title]" value="{{ $post->title }}">
                @error('post.title')
                    <p style="color:red">{{ $message }}</p>
                @enderror 
                <h3>詳細文：</h3>
                <textarea name="post[main]">{{ $post->main }}</textarea>
                @error('post.main')
                    <p style="color:red">{{ $message }}</p>
                @enderror  
                
                </br>
                <input type="submit" value="更新する">
                
            </form>
            <button type="button" onclick="location.href='/Dancers/{{ $post->id }}'">戻る</button>
        </div>
        @endsection
    </body>