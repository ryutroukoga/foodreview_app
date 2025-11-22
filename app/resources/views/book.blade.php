@extends('layout.layout')
@section('content')


<main class="bookmark-section">
    <div class="container">
        <div class="text-center">
            <h1 class="bookmark-title">
                <i class="bi bi-bookmark-star"></i>ブックマーク
            </h1>
        </div>

        <div class="text-center">
            <span class="bookmark-count">
                <i class="bi bi-star-fill"></i>{{ count($bookmarkedReviews) }} 件のブックマーク
            </span>
        </div>

        <div class="table-container">
            @if(count($bookmarkedReviews) > 0)
            <table class="table table-marble">
                <thead>
                    <tr>
                        <th scope="col"><i class="bi bi-star-fill"></i></th>
                        <th scope="col">店舗名</th>
                        <th scope="col">住所</th>
                        <th scope="col">タイトル</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookmarkedReviews as $review)
                    <tr>
                        <td class="bookmark-star">★</td>
                        <td class="shop-name">{{ $review->shop->name }}</td>
                        <td class="shop-address">{{ $review->shop->address }}</td>
                        <td class="review-title">{{ $review->title }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="empty-bookmark">
                <i class="bi bi-bookmark"></i>
                <p>ブックマークはまだありません</p>
            </div>
            @endif
        </div>

        <div class="text-center">
            <a href="{{ route('profile') }}" class="back-link">
                <i class="bi bi-arrow-left"></i>プロフィールに戻る
            </a>
        </div>
    </div>
</main>
@endsection