@extends('layouts.app')
@section('title', 'ユーザーの詳細')
@section('content')

@if (session('err_msg_update'))
    <div class="err_style col-md-4 my-3 m-auto fw-bold fs-4 rounded">
        <p class="text-success">
            {{ session('err_msg_update') }}
        </p>
    </div>
@endif

<div class="p-1">
    <div class="content bg-white p-3 my-3 rounded">
        <div class="flex-main justify-content-around ">

            <div class="de-main">
                <div class="detail-name">
                    <p class="text-center">
                        <span class="span-name fs-4 fw-bold">{{ $post->user->name }}</span>
                    </p>
                </div>
                <div class="detail-title my-3">
                    <h5 class="text-center fs-3 ">『<span class="fw-bold">{{ $post->title }}</span>』</h5>
                </div>
                <div class="passege my-2">
                    <p class="card-text text-start" style="white-space: pre-wrap;">{{ $post->content }}</p>
                </div>
            </div>
        
        <div class="good-count mt-4">
            @if($post->users()->where('user_id', Auth::id())->exists())
            <div class="my-3 text-center">
                <form action="{{ route('unfavorites', $post) }}" method="POST" onSubmit="return unlikeSubmit()">
                    @csrf
                    <button type="submit" class="btn btn-danger rounded-pill"><i class="fa-solid fa-heart"></i>・{{ $post->users()->count() }}</button>
                </form> 
            </div>
            @else
            <div class="my-3 text-center">
                <form action="{{ route('favorites', $post) }}" method="POST" onSubmit="return likeSubmit()">
                    @csrf
                    <button type="submit" class="btn btn-primary rounded-pill"><i class="fa-solid fa-heart"></i>・{{ $post->users()->count() }}</button>
                </form>
            </div>
            @endif
            
            <div class="detail-footer text-muted text-center">
                <p class="footer mt-4">投稿時間：{{ $post->created_at }}</p>
            </div>  
        </div>
    </div>


    <div class="detail-page-btn justify-content-center p-2">
        <div class="justify-content-center" style="display: flex;" id="all-exit">
            <a class="btn btn-secondary" href="{{ route('home') }}"><i class="fa-solid fa-arrow-left-long"></i></a>
            <a href="{{ route('show', $post->user_id)}}" class="btn btn-dark ms-3"><i class="fa-solid fa-user"></i></a>
            <a href="{{ route('comment.create', ['post_id' => $post->id])}}" class="btn btn-warning ms-3"><i class="fa-solid fa-comments"></i></a>

        </div>
        @if(Auth::user()->id == $post->user_id)
        <div class="only-user-btn justify-content-center mt-3" style="display: flex;" >
        <form method="POST" action="{{ route('delete', $post->id)}}" onSubmit="return bookDlete()">
            @csrf
            <button type="submit" class="btn btn-danger me-4" onclick=><i class="fas fa-trash-alt"></i></button>
        </form>
        @endif    
        @if(Auth::user()->id == $post->user_id)
        <a href="{{ route('edit', $post->id) }}" class="btn btn-info" id="edit"><i class="fa-solid fa-pen-to-square"></i></a> 
        </div>
        @endif
    </div>
</div>
</div>
        

    @if (session('err_msg_comment'))
        <div class="err_style my-3 col-md-4 m-auto fw-bold fs-4 rounded">
            <p class="text-success">
                {{ session('err_msg_comment') }}
            </p>
        </div>
    @endif

<header class="comment_list mt-4 mb-3">
    <div class="comment">
        <h1 class="text-center fw-bold text-warning"><span id="span_comment" class="bg-dark bg-gradient p-2 rounded">~List of Comments~</span></h1>
    </div>
</header>


    @foreach ($post->comment as $comment)

        <div class="comment-list my-4 p-1">
            <div class="comment-main bg-gradient p-2 rounded">
                <p class="comment-name">
                    <a href="{{ route('show', $comment->user->id) }}">
                        <span class="home_title fs-5 fw-bold text-black">{{ $comment->user->name }}</span>
                    </a>
                </p>
                <div class="comment-content">
                    <p class="text-start" style="white-space: pre-wrap;">{{$comment->comment}}</p>
                </div>
                <p class="comment-time">{{$comment->created_at}}</p>
            </div>
        </div>

    @endforeach

<script>
function bookDlete(){
    if(confirm('削除してもいいかな？')){
        return true;
    } else {
        return false;
        }
    }

    function likeSubmit(){
        if(confirm('いいねを押す覚悟はあるか？＊押したあとリスト画面へ戻るよ！')){
            return true;
        } else {
            return false;
            }
        }
    function unlikeSubmit(){
        if(confirm('いいねを取り消す覚悟はあるか？＊押したあとリスト画面へ戻るよ！')){
            return true;
        } else {
            return false;
            }
        } 
</script>
@endsection
