@extends('layout.layout')

@section('content')
<div class="marble-bg marble-overlay">
  <div class="container">
    <div class="row justify-content-center align-items-center auth-container-marble">
      <div class="col-md-8 col-lg-6">

        <div class="text-center mb-5">
          <h2 class="page-title-marble">
            <i class="bi bi-box-arrow-in-right"></i> Login
          </h2>
          <p class="page-description-marble">
            会員専用ページへログイン
          </p>
        </div>

        <div class="card-marble">
          <div class="card-body p-5">

            @if($errors->any())
            <div class="alert-marble-danger">
              <p class="mb-2"><i class="bi bi-exclamation-triangle-fill"></i> 入力内容をご確認ください</p>
              <ul class="mb-0 ps-3">
                @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
              @csrf

              <div class="form-group-marble">
                <label for="email" class="form-label-marble">
                  <i class="bi bi-envelope"></i> メールアドレス
                </label>
                <input type="email" class="form-control-marble" id="email" name="email" value="{{ old('email') }}" placeholder="example@email.com" />
              </div>

              <div class="form-group-marble">
                <label for="password" class="form-label-marble">
                  <i class="bi bi-key"></i> パスワード
                </label>
                <input type="password" class="form-control-marble" id="password" name="password" />
              </div>

              <div class="text-center mt-5">
                <button type="submit" class="btn-marble-submit w-100">
                  送　信
                </button>
              </div>

              <div class="text-center mt-4">
                <a href="{{ route('password.request') }}" class="back-link-marble text-small-marble">
                  <i class="bi bi-question-circle"></i> パスワードを忘れた方はこちら
                </a>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection