@extends('layout.layout')

@section('content')
<div class="marble-bg marble-overlay">
    <div class="container">
        <div class="row justify-content-center align-items-center auth-container-marble">
            <div class="col-md-8 col-lg-6">

                <div class="text-center mb-5">
                    <h2 class="page-title-marble">
                        <i class="bi bi-shop-window"></i> Shop Registration
                    </h2>
                    <p class="page-description-marble">
                        店舗アカウント新規登録
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

                        <form action="{{ route('shop.logincon') }}" method="POST">
                            @csrf

                            <div class="form-group-marble">
                                <label for="name" class="form-label-marble">
                                    <i class="bi bi-person-badge"></i> ユーザー名
                                </label>
                                <input type="text" class="form-control-marble" id="name" name="name" placeholder="店舗名または担当者名" />
                            </div>

                            <div class="form-group-marble">
                                <label for="email" class="form-label-marble">
                                    <i class="bi bi-envelope"></i> メールアドレス
                                </label>
                                <input type="text" class="form-control-marble" id="email" name="email" placeholder="example@email.com" />
                            </div>

                            <div class="form-group-marble">
                                <label for="password" class="form-label-marble">
                                    <i class="bi bi-key"></i> パスワード
                                </label>
                                <input type="password" class="form-control-marble" id="password" name="password" placeholder="パスワードを入力" />
                            </div>

                            <div class="form-group-marble">
                                <label for="password-confirm" class="form-label-marble">
                                    <i class="bi bi-check-circle"></i> パスワード（確認）
                                </label>
                                <input type="password" class="form-control-marble" id="password-confirm" name="password_confirmation" placeholder="もう一度入力してください" />
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn-marble-submit w-100">
                                    <i class="bi bi-box-arrow-in-up"></i> 登　録
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <a href="{{ route('shop.login') }}" class="back-link-marble text-small-marble">
                                    <i class="bi bi-arrow-left"></i> 店舗ログイン画面に戻る
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