@extends('layout.layout')

@section('content')
<div class="container">

    @if (session('message'))
    <div class="row justify-content-center mb-4">
        <div class="col-md-10">
            <div class="alert-marble-success">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
            </div>
        </div>
    </div>
    @endif

    <div class="text-center mb-5">
        <h1 class="page-title-marble">
            <i class="bi bi-shop"></i> Shop Detail
        </h1>
        <p class="page-description-marble">店舗詳細情報</p>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="card-marble h-100">
                <div class="card-body d-flex align-items-center justify-content-center">
                    @if(isset($detail['image']) && $detail['image'])
                    <img src="{{ asset('storage/' . $detail['image']) }}" class="shop-image-marble" alt="{{ $detail['name'] }}">
                    @else
                    <div class="text-center py-5" style="color: #ccc;">
                        <i class="bi bi-image" style="font-size: 5rem;"></i>
                        <p class="mt-2">No Image</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card-marble h-100">
                <div class="card-body">
                    <h3 class="mb-4" style="font-family: 'Noto Serif JP'; color: #4a4a4a; padding-bottom: 10px; border-bottom: 2px solid #c4a77d;">
                        {{ $detail['name'] }}
                    </h3>

                    <table class="table-detail-marble w-100 mb-4">
                        <tbody>
                            <tr>
                                <th><i class="bi bi-star-fill me-2 text-warning"></i> 平均評価</th>
                                <td>
                                    <span class="fs-4 fw-bold" style="color: #8b7355;">{{ round($averageScore, 1) }}</span> 点
                                </td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-geo-alt-fill me-2" style="color: #c4a77d;"></i> 住所</th>
                                <td>{{ $detail['address'] }}</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-chat-quote-fill me-2" style="color: #c4a77d;"></i> 店舗コメント</th>
                                <td>
                                    {{-- 改行を反映させつつ安全に出力 --}}
                                    {!! nl2br(e($detail['comment'])) !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center mt-auto">
                        <a href="{{ route('newreview', ['shopdetail' => $detail['id']]) }}" class="text-decoration-none">
                            <button type="button" class="btn-marble-submit px-5">
                                <i class="bi bi-pencil-square me-2"></i> 新規レビューを投稿する
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="mb-3">
                <h4 class="section-subtitle">
                    <i class="bi bi-list-stars me-2"></i> Review List
                </h4>
            </div>

            <div class="card-marble">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table-marble w-100">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 120px;">詳 細</th>
                                    <th class="text-center" style="width: 100px;">点 数</th>
                                    <th>ユーザー名</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $review)
                                <tr>
                                    <td class="text-center">
                                        <a href="{{ route('review_detail', ['reviewdetail' => $review['id']]) }}" class="detail-link-marble">
                                            <i class="bi bi-eye"></i> 見る
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <span class="score-badge-marble">
                                            {{ $review['score'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <i class="bi bi-person-circle me-2" style="color: #c4a77d;"></i>
                                        {{ $review->user->name }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($reviews->isEmpty())
                    <div class="text-center py-5">
                        <i class="bi bi-chat-left-dots" style="font-size: 2rem; color: #ccc;"></i>
                        <p class="text-muted mt-2">まだレビューはありません。<br>最初のレビューを投稿してみましょう！</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection