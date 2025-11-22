@extends('layout.layout')
@section('content')
<main class="profile-edit-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="text-center">
                    <h1 class="profile-edit-title">
                        <i class="bi bi-pencil-square"></i>プロフィール編集
                    </h1>
                </div>

                <div class="form-card-marble">
                    @if($errors->any())
                    <div class="alert-marble-danger">
                        @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                        @endforeach
                    </div>
                    @endif

                    <form action="{{ route('profileupdate') }}" method="post">
                        @csrf

                        <div class="form-group-marble">
                            <label for="name" class="form-label-marble">新しいユーザー名</label>
                            <input type="text"
                                class="form-control-marble"
                                id="name"
                                name="name"
                                placeholder="ユーザー名を入力"
                                value="{{ old('name', Auth::user()->name) }}">
                        </div>

                        <div class="separator-label"><span>パスワード変更</span></div>
                        <div class="form-separator"></div>

                        <div class="form-group-marble">
                            <label for="password" class="form-label-marble">新しいパスワード</label>
                            <input type="password"
                                class="form-control-marble"
                                id="password"
                                name="password"
                                placeholder="新しいパスワードを入力">
                            <p class="form-hint">
                                <i class="bi bi-info-circle"></i>変更しない場合は空欄のままにしてください
                            </p>
                        </div>

                        <div class="form-group-marble">
                            <label for="password_confirmation" class="form-label-marble">パスワード確認</label>
                            <input type="password"
                                class="form-control-marble"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="パスワードを再入力">
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn-marble-submit">
                                <i class="bi bi-check-lg"></i>変更を保存
                            </button>
                        </div>
                    </form>

                    <div class="text-center">
                        <a href="{{ route('profile') }}" class="back-link-marble">
                            <i class="bi bi-arrow-left"></i>プロフィールに戻る
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection