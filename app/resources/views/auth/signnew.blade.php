@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="card mt-5">
                <div class="card">
                    <div class="card-title text-center large-text">新規登録</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('sign.check') }}" method="POST" enctype="multipart/form-data">
                        <div class="d-flex justify-content-around">
                            <img src="https://via.placeholder.com/60" alt="ユーザー名" class="user-image">
                        </div>
                        <br>
                        @csrf
                        <div class="d-flex justify-content-around">
                            <label for="image" class="col-sm-2 col-form-label no-wrap space">プロフィール画像</label>
                            <div class="col-sm-7">
                                <input type="file" class="form-control" id="image" name="image" />
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-around">
                            <label for="name" class="col-sm-2 col-form-label no-wrap space">ユーザー名<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required />
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-around">
                            <label for="email" class="col-sm-2 col-form-label no-wrap space">メールアドレス<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required />
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-around">
                            <label for="password" class="col-sm-2 col-form-label no-wrap space">パスワード<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password" name="password" required />
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-around">
                            <label for="password_confirmation" class="col-sm-2 col-form-label no-wrap space">新しいパスワード(確認)<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required />
                            </div>
                        </div>
                        <br>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">確認画面へ</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
