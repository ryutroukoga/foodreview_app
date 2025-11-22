@extends('layout.layout')
@section('content')
<div class="marble-bg marble-overlay">
    @if (session('error'))
    <div class="container pt-4">
        <div class="alert alert-marble">
            {{ session('error') }}
        </div>
    </div>
    @endif

    <main class="py-5">
        <!-- 検索エリア -->
        <div class="container mb-5">
            <div class="text-center mb-4">
                <h2 class="section-title">レビュー検索</h2>
            </div>
            <div class="search-container">
                <form action="{{ route('search') }}" method="GET">
                    @csrf
                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="col-md-5">
                            <input class="form-control" type="text" name="keyword" value="" placeholder="店名、住所を入力...">
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="average_score">
                                <option value="" selected>点数を選択</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">★ {{ $i }} 点</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-marble w-100">検索</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- レビューカード一覧 -->
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($reviews as $review)
                <div class="col">
                    <div class="marble-card h-100">
                        <div class="card-body text-center">
                            <div class="score-badge">
                                {{ $review['score'] }}
                            </div>

                            <div class="text-start">
                                <div class="card-label">タイトル</div>
                                <div class="card-value">{{ $review['title'] }}</div>

                                <div class="card-label">コメント</div>
                                <div class="card-value">{{ $review['comment'] }}</div>

                                <div class="card-label">住所</div>
                                <div class="card-value">{{ $review->shop['address'] }}</div>
                            </div>

                            <a href="{{ route('shopdetail', ['shopdetail' => $review->shop['id']]) }}" class="detail-link">
                                詳細を見る →
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- ページネーション -->
            <div class="d-flex justify-content-center mt-5 pagination-marble">
                {{ $reviews->links() }}
            </div>
        </div>
    </main>
</div>
@endsection