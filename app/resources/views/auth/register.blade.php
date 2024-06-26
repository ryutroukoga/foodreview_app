@extends('layout.layout')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <div class="card-header text-center">新規会員登録</div>
        <div class="card-body">
          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
            @endforeach
          </div>
          @endif
          <form action="{{ route('login.con') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
              <label for="name">ユーザー名</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
            </div>
            <div class="form-group mt-3">
              <label for="email">メールアドレス</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="form-group mt-3">
              <label for="password">パスワード</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group mt-3">
              <label for="password-confirm">パスワード（確認）</label>
              <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
            </div>
            <div class="text-center mt-3">
              <button type="submit" class="btn btn-primary">送信</button>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection