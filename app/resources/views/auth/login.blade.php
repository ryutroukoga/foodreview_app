@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <div class="card">
          <div class="card-title text-center large-text">ログイン</div>
        </div>
        <div class="card-body">
          <form action="{{ route('home') }}" method="POST">
            @csrf
            <div class="d-flex justify-content-around">
              <label for="email" class="col-sm-2 col-form-label no-wrap">メールアドレス</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required />
              </div>
            </div>
            <br>
            <div class="d-flex justify-content-around">
              <label for="password" class="col-sm-2 col-form-label no-wrap">パスワード</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="password" required />
              </div>
            </div>
            <br>
            <div class="text-right">
              <a href="{{ route('password.reset') }}">パスワード忘れた方はこちら</a>
            </div>
            <br>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">ログイン</button>
            </div>
            <br>
            <div class="text-center">
              <a href="{{ route('sign.new') }}" class="btn btn-primary">新規登録</a>
            </div>
            <br>
            <div class="text-right">
              <a href="{{ route('home') }}">ログインせずに始める</a>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection