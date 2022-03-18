@extends('layouts.app')
@section('title', 'TSUBUYAKI BOOK')
@section('content')

<header class="head_list mt-4 mb-3">
    <div class="title">
        <h1 class="text-center fw-bold"><span id="span_title" class="bg-white p-2 rounded">~List of Books~</span></h1>
    </div>
</header>

<!-- Error & Search Message -->
<div class="message m-auto">
    @isset($search_result)
    <div class="err_style col-md-4 pt-1 rounded ">
        <p class="text-success fs-5 fw-bold">{{ $search_result }}</p>
    </div>
    @endisset
    
    @if (session('err_msg'))
    <div class="err_style col-md-4 pt-1 rounded">
        <p class="text-success fs-5 fw-bold">
            {{ session('err_msg') }}
        </p>
    </div>
    @endif
</div>
    
<!-- 1000px = Media Query -->

<div class="container">
    <div class="main-posts">
        @foreach($posts as $post)
        <div class="main-post-table rounded bg-white">
            <div class="main-body justify-content-around">
                <div class="first-main-body ">
                    <p class="card-title my-3 fs-5 text-center"><a href="{{ route('show', $post->user_id)}}" class="title-name text-decoration-none text-dark">{{ $post->user->name }}</a>
                    </p>
                    <h2 class="text-center text-break">『{{ $post->title }}』</h2>
        
                </div>
                <div class="second-main-body">
                @if($post->users()->where('user_id', Auth::id())->exists())
                <div class="my-3">
                    <form action="{{ route('unfavorites', $post) }}" method="POST" onSubmit="return checkDlete()">
                        @csrf
                        <button type="submit" class="btn btn-danger rounded-pill"><i class="fa-solid fa-heart"></i>・{{ $post->users()->count() }}</button>
                    </form> 
                </div>
                @else
                <div class="my-3">
                    <form action="{{ route('favorites', $post) }}" method="POST" onSubmit="return checkSubmit()">
                        @csrf
                        <button type="submit" class="btn btn-primary rounded-pill"><i class="fa-solid fa-heart"></i>・{{ $post->users()->count() }}</button>
                    </form>
                </div>
                @endif
                <div class="detail-btn mb-2">
                    <a href="{{ route('detail', $post->id)}}" class="btn text-decoration-none fw-bold">詳細へ！</a>
                </div>
            </div>
        </div>
        <div class="card-footer text-center bg-dark text-white fw-bold">
            {{ $post->created_at }}
        </div> 
    </div>
    @endforeach

    @if(isset($search_query))
            {{ $posts->appends(['search' => $search_query])->links() }}
    @else
        {{ $posts->links() }}
    @endif
</div>

</div>

<script>
    function checkSearch(){
        if(confirm('その検索ワードで検索しますか？')){
            return true;
        } else {
            return false;
            }
        }
    function checkSubmit(){
        if(confirm('いいねを押す覚悟はあるか？')){
            return true;
        } else {
            return false;
            }
        }
    function checkDlete(){
        if(confirm('いいねを取り消す覚悟はあるか？')){
            return true;
        } else {
            return false;
            }
        } 
</script>
@endsection
