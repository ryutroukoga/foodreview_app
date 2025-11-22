@extends('layout.layout')

@section('content')
<main class="confirm-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-md-8 col-lg-6">

                <div class="text-center mb-5">
                    <h1 class="confirm-title">
                        <i class="bi bi-clipboard-check"></i>内容確認
                    </h1>
                </div>

                <div class="confirm-card">
                    <div class="confirm-icon">
                        <i class="bi bi-person-check"></i>
                    </div>

                    <p class="confirm-message">以下の内容で登録します</p>

                    <div class="confirm-details">
                        <div class="confirm-item">
                            <div class="confirm-label">
                                <i class="bi bi-person"></i>ユーザー名
                            </div>
                            <div class="confirm-value text-break">
                                {{ $user['name'] }}
                            </div>
                        </div>

                        <div class="confirm-item">
                            <div class="confirm-label">
                                <i class="bi bi-envelope"></i>メールアドレス
                            </div>
                            <div class="confirm-value text-break">
                                {{ $user['email'] }}
                            </div>
                        </div>
                    </div>

                    <div class="confirm-actions mt-4">
                        <a href="{{ route('login') }}" class="btn-marble-submit">
                            <i class="bi bi-check-lg"></i>登　録
                        </a>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ url()->previous() }}" class="back-link-marble">
                            <i class="bi bi-arrow-left"></i>入力画面に戻る
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection