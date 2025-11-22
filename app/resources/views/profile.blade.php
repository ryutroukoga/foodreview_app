@extends('layout.layout')
@section('content')

<main class="profile-section">
    <div class="container">
        @if (session('success'))
        <div class="alert-marble-success">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
        </div>
        @endif

        <div class="text-center">
            <h1 class="profile-title">プロフィール</h1>
        </div>

        <div class="row justify-content-center g-4 mt-2">
            <!-- プロフィール情報 -->
            <div class="col-md-5">
                <div class="profile-card">
                    <div class="profile-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="text-center">
                        <div class="profile-info-label">ユーザー名</div>
                        <div class="profile-info-value">{{ Auth::user()->name }}</div>

                        <div class="profile-info-label">メールアドレス</div>
                        <div class="profile-info-value">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <!-- アクションボタン -->
            <div class="col-md-4">
                <div class="action-card">
                    <a href="{{ route('profileuser') }}" class="btn-marble-outline">
                        <i class="bi bi-pencil"></i>プロフィール編集
                    </a>
                    <a href="{{ route('userprofile') }}" class="btn-marble-outline">
                        <i class="bi bi-envelope"></i>メールアドレス編集・退会
                    </a>
                    <a href="{{ route('book') }}" class="btn-marble-outline">
                        <i class="bi bi-bookmark"></i>ブックマーク一覧
                    </a>
                </div>
            </div>
        </div>

        <!-- 過去の投稿一覧 -->
        <h5 class="section-subtitle"><i class="bi bi-clock-history me-2"></i>過去の投稿一覧</h5>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($reviews as $review)
            <div class="col">
                <div class="review-card-marble">
                    <img src="{{ asset('storage/' . $review->image) }}" class="card-img-top" alt="レビュー画像">
                    <div class="card-body">
                        <input type="hidden" class="review-id" value="{{ $review['id'] }}">

                        <div class="review-score">
                            <i class="bi bi-star-fill"></i>{{ $review['score'] }} 点
                        </div>

                        <div class="review-title-text">{{ $review['title'] }}</div>

                        <div class="review-actions">
                            <a href="{{ route('reviewdetail',['reviewdetail' => $review['id']]) }}" class="detail-link-marble">
                                詳細を見る
                            </a>
                            <button type="button" class="bookmark-btn-marble bookmark-btn {{ $review->bookmarked ? 'bookmarked' : '' }}">
                                <i class="bi {{ $review->bookmarked ? 'bi-star-fill' : 'bi-star' }}"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center pagination-marble">
            {{ $reviews->links() }}
        </div>
    </div>
</main>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(function() {
        $('.bookmark-btn').click(function() {
            const review_id = $(this).closest('.card-body').find('.review-id').val();
            const button = $(this);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route("ajaxlike") }}',
                type: 'POST',
                data: {
                    'review_id': review_id
                },
                success: function(data) {
                    if (data.bookmarked) {
                        button.addClass('bookmarked').find('i').removeClass('bi-star').addClass('bi-star-fill');
                    } else {
                        button.removeClass('bookmarked').find('i').removeClass('bi-star-fill').addClass('bi-star');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('エラー: ' + error);
                }
            });
        });
    });
</script>