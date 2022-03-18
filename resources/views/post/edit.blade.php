@extends('layouts.app')
@section('title', '編集フォーム')
@section('content')
<div class="my-2 p-1">
    <div class="col-md-8 col-md-offset-2 m-auto bg-dark px-3 py-4 rounded">
        <h1 class="text-white text-center fw-bold">The Editing Form</h1>
        <form method="POST" action="{{ route('update', $post->id) }}" onSubmit="return checkSubmit()">
          @csrf
          <input type="hidden" name="id" value="{{ $post->id }}">
            <div class="form-group">
                <label for="title" class="text-white fw-bold fs-4">
                    本のタイトル
                </label>
                <input id="title" name="title" class="form-control" value="{{ $post->title }}" type="text" placeholder="何の本を読んだ？">
                @if ($errors->has('title'))
                    <div class="text-warning fw-bold">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group mt-2">
                <label for="content" class="text-white fw-bold fs-4">
                    学んだこと
                </label>
                <textarea id="content" name="content" class="form-control" rows="4" placeholder="編集する内容を書いてください">{{ $post->content }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-warning fw-bold">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                
            </div>
            <div class="mt-3">
                <a class="btn btn-secondary" href="{{ route('home') }}"><i class="fa-solid fa-arrow-left-long"></i></a>
                <button type="submit" class="btn btn-primary ms-2">
                    更新
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(confirm('更新してもいいかな？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection