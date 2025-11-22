@extends('layout.layout')
@section('content')

<style>
 
</style>

<main class="email-edit-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="text-center">
                    <h1 class="email-edit-title">
                        <i class="bi bi-envelope"></i>メールアドレス編集
                    </h1>
                </div>

                <!-- メールアドレス編集カード -->
                <div class="form-card-marble">
                    @if($errors->any())
                    <div class="alert-marble-danger">
                        @foreach($errors->all() as $message)
                        <p>{{ $message }}</p>
                        @endforeach
                    </div>
                    @endif

                    <form action="{{ route('userupdate') }}" method="post">
                        @csrf

                        <div class="form-group-marble">
                            <label for="email" class="form-label-marble">新しいメールアドレス</label>
                            <input type="email"
                                class="form-control-marble"
                                id="email"
                                name="email"
                                placeholder="example@email.com"
                                value="{{ old('email', Auth::user()->email) }}">
                        </div>

                        <div class="text-center">
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

                <!-- 退会カード -->
                <div class="danger-card-marble">
                    <h2 class="danger-title">
                        <i class="bi bi-exclamation-triangle"></i>アカウント退会
                    </h2>
                    <p class="danger-description">
                        退会すると、登録されたすべての情報が削除されます。<br>
                        この操作は取り消すことができません。
                    </p>
                    <form action="{{ route('userdelete', ['user' => Auth::user()->id]) }}" method="post" onsubmit="return confirmDelete()">
                        @csrf
                        <div class="text-center">
                            <button type="submit" class="btn-marble-danger">
                                <i class="bi bi-person-x"></i>退　会
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>

<script>
    function confirmDelete() {
        return confirm('本当に削除しますか？この操作は元に戻せません。退会してしまうと登録いただいた情報はすべて削除されます。');
    }
</script>

@endsection