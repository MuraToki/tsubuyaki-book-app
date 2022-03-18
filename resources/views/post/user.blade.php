@extends('layouts.app')
@section('title', 'ユーザーの投稿一覧')
@section('content')

<div class="mb-4">
    <h2 class="header-name text-center ">
       <span class="rounded p-2 fw-bold"> {{ $user->name }}'s Posting Lists</span>
    </h2>
</div>


<div class="user-body">
    @foreach($user->posts as $post)
    <div class="user-main my-4 mx-2 p-2 bg-dark bg-gradient text-white rounded">

        <div class="user-titcon">
            <h4 class="user-title"><span class="fw-bold">本のタイトル</span>
                『{{ $post->title }}』
            </h4>
            <p class="user-content fs-5">
                <span class="fw-bold">内容：</span>
                {{ $post->content }}
            </p>
        </div>

            <div class="user-create my-2">
                <span class="fw-bold">投稿日時：</span>
                {{ $post->created_at }}
            </div> 
            
            
            
            <a class="btn btn-secondary" href="{{ route('home') }}"><i class="fa-solid fa-arrow-left-long"></i></a>
            <a href="{{ route('detail', $post->id) }}" class="btn btn-primary mx-2">詳細</a>
            
          
        </div>
        @endforeach
    </div>
        
        @endsection