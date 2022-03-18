@extends('layouts.app')
@section('title', '投稿作成フォーム')
@section('content')
<div class="container">
    <div class="row justify-content-center p-1">
        <div class="col-md-8 col-md-offset-2 bg-warning px-3 py-4 rounded">
          <h1 class="text-center fw-bold">The Creating Form</h1>
          <form action="{{ route('store')}}" method="POST" onSubmit="return checkSubmit()">
            @csrf
                <div class="form-group">
                  <label class="fs-3 fw-bold">本のタイトル</label>
                  <input type="text" class="form-control" placeholder="本のタイトルを入力して下さい" name="title">
                    @if ($errors->has('title'))
                      <div class="text-danger fs-5 fw-bold">
                        {{ $errors->first('title') }}
                      </div>
                    @endif
                </div>
                <div class="form-group mt-2">
                    <label class="fs-3 fw-bold">学んだこと</label>
                    <textarea class="form-control" rows="5" name="content" placeholder="その本で学んだことを入力して下さい" ></textarea>
                    @if ($errors->has('content'))
                      <div class="text-danger fs-5 fw-bold">
                        {{ $errors->first('content') }}
                      </div>
                    @endif
                </div>
                <div class="pt-3">
                  <a class="btn btn-secondary" href="{{ route('home') }}"><i class="fa-solid fa-arrow-left-long"></i></a>
                  <button type="submit" class="btn btn-primary mx-2">作成</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function checkSubmit(){
    if(confirm('投稿する覚悟はあるか？')){
        return true;
    } else {
        return false;
        }
    }
</script>
@endsection