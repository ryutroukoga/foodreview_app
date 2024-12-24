@extends('layout.layout')
@section('content')
<main>
    <h1 class="text-center">新規投稿作成</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col align-self-start">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                    @endforeach
                </div>
                @endif
                <div class="mb-3">
                    <form action="{{ route('post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="title" class='mt-2'>タイトル</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="タイトル入力" value="{{ old('title') }}">
                </div>
                <label for='comment' class='mt-2'>コメント入力</label>
                <textarea class='form-control' name='comment' value="{{ old('comment') }}"></textarea>
                <div class="col-md-4">
                    <label for='score' class='mt-2'>点数(１~５で入力)</label>
                    <div class="col-md-4">
                        <select class="form-control" name="score">
                            <option value="" selected>点数</option>
                            @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="col align-self-start">
                <div class="mb-3">
                    <label for="formFile" class='mt-2'>画像選択</label>
                    <input class="form-control" type="file" id="formfile" name="formfile">
                </div>
            </div>
            <input type="hidden" name="shop_id" value="{{ $details['id'] }}">
            <div class="text-center">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">作　成</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</main>
@endsection