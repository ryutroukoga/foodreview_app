@extends('layout.layout')

@section('content')
<div class="marble-bg marble-overlay">
    @if (session('error'))
    <div class="container pt-4">
        <div class="alert alert-marble-danger">
            {{ session('error') }}
        </div>
    </div>
    @endif

    <main class="py-5">
        <div class="container mb-5">
            <div class="text-center mb-4">
                <h2 class="section-title">レビュー検索</h2>
            </div>
            <div class="search-container">
                <form action="{{ route('search') }}" method="GET">
                    @csrf
                    <div class="row g-3 align-items-end justify-content-center">
                        <div class="col-md-5">
                            <label class="form-label-marble mb-1">KEYWORD</label>
                            <input class="form-control form-control-marble" type="text" name="keyword" value="{{ request('keyword') }}" placeholder="店名、住所を入力...">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label-marble mb-1">SCORE</label>
                            <select class="form-control form-control-marble" name="average_score">
                                <option value="" selected>点数を選択</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ request('average_score') == $i ? 'selected' : '' }}>
                                    ★ {{ $i }} 点
                                    </option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-marble-submit btn-search-fix">検索</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="mb-4">
                <h3 class="section-subtitle">
                    <i class="bi bi-list-check me-2"></i> Search Results
                </h3>
            </div>

            @if($reviews->count() > 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 g-4">
                @foreach($reviews as $review)
                <div class="col">
                    <div class="marble-card h-100">
                        <div class="card-body text-center">

                            <div class="mb-3">
                                <div class="score-section-marble text-center my-4">

                                    <div class="score-label-text mb-2">
                                        <span style="border-bottom: 1px solid #c4a77d; padding-bottom: 2px;">レビュー点</span>
                                    </div>

                                    <div class="d-flex justify-content-center align-items-end mb-2">
                                        <div class="score-badge-marble">
                                            {{ $review['score'] }}
                                        </div>
                                        <span class="ms-2 mb-2" style="color: #8b7355; font-weight: bold;">点</span>
                                    </div>

                                    <div class="score-stars" style="color: #c4a77d; font-size: 1.1rem;">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="bi bi-star{{ $i <= $review['score'] ? '-fill' : '' }}"></i>
                                            @endfor
                                    </div>

                                    <div class="mt-1" style="font-size: 0.85rem; color: #666;">
                                        @if($review['score'] >= 4.5) <span class="text-success"><i class="bi bi-trophy-fill"></i> 最高評価</span>
                                        @elseif($review['score'] >= 4) <span>素晴らしい</span>
                                        @elseif($review['score'] >= 3) <span>普通</span>
                                        @else <span>改善の余地あり</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 pb-2 border-bottom">
                                <h5 class="shop-name-title">
                                    {{ $review->shop['name'] ?? '不明な店舗' }}
                                </h5>
                            </div>

                            <div class="card-text-area">
                                <div class="card-label">タイトル</div>
                                <div class="fw-bold text-dark mb-2 text-truncate">{{ $review['title'] }}</div>

                                <div class="card-label">コメント</div>
                                <div class="card-value comment-truncate">
                                    {{ $review['comment'] }}
                                </div>

                                <div class="card-label mt-2">住所</div>
                                <div class="card-value text-truncate">{{ $review->shop['address'] ?? '住所不明' }}</div>
                            </div>

                            @if(isset($review->shop['id']))
                            <div class="mt-3 pt-3 border-top">
                                <a href="{{ route('shopdetail', ['shopdetail' => $review->shop['id']]) }}" class="detail-link">
                                    詳細を見る →
                                </a>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5 pagination-marble">
                {{ $reviews->appends(request()->query())->links() }}
            </div>

            @else
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card-marble text-center py-5">
                        <i class="bi bi-search empty-state-icon"></i>
                        <h4 class="empty-state-title">該当するレビューが見つかりません</h4>
                        <p class="text-muted">検索条件を変更して、もう一度お試しください。</p>
                        <div class="mt-4">
                            <a href="{{ route('search') }}" class="btn-marble btn-auto-width">
                                条件をクリアして全表示
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </main>
</div>
@endsection