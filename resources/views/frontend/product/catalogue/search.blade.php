@extends('frontend.homepage.layout')
@section('content')
    <div class="search-page page-wrapper">
        <div class="uk-container uk-container-center mt40">
            <div class="panel-body">
                <h2 class="heading-1 mb20"><span>{{ $seo['meta_title'] }}</span></h2>
                
                @php
                    $hasProducts = !is_null($products) && $products->count() > 0;
                    $hasPosts = !is_null($posts) && $posts->count() > 0;
                    $hasResults = $hasProducts || $hasPosts;
                @endphp

                @if($hasResults)
                    {{-- Products Section --}}
                    @if($hasProducts)
                        <div class="search-section mb40">
                            <h3 class="section-title mb20">Khóa học ({{ $products->total() }})</h3>
                            <div class="product-list mb30">
                                <div class="courses-grid">
                                    @foreach($products as $product)
                                        @php
                                            $productLanguage = $product->languages->first();
                                            $productName = $productLanguage->pivot->name ?? '';
                                            $productCanonical = write_url($productLanguage->pivot->canonical ?? '');
                                            $productDescription = $productLanguage->pivot->description ?? '';
                                            $productPrice = number_format($product->price ?? 0, 0, ',', '.');
                                            $productImage = $product->image ?? '';
                                            $totalLesson = $product->total_lesson ?? 0;
                                            $duration = $product->duration ?? 0;
                                            $productRate = $product->rate ?? '';
                                        @endphp
                                        <div class="course-card wow fadeInUp" data-wow-duration="0.6s">
                                            <div class="course-image">
                                                @if($productImage)
                                                    <img src="{{ asset($productImage) }}" alt="{{ $productName }}">
                                                @else
                                                    <div class="image-placeholder">
                                                        <div class="vstep-logo">VSTEP</div>
                                                    </div>
                                                @endif
                                                @if($productRate)
                                                    <div class="course-level">{{ $productRate }}</div>
                                                @endif
                                            </div>
                                            <div class="course-content">
                                                <h3 class="course-title">{{ $productName }}</h3>
                                                <div class="course-info">
                                                    @if($totalLesson > 0)
                                                        <div class="info-item">
                                                            <i class="fa fa-book"></i>
                                                            <span>{{ $totalLesson }} bài học</span>
                                                        </div>
                                                    @endif
                                                    @if($duration > 0)
                                                        <div class="info-item">
                                                            <i class="fa fa-calendar"></i>
                                                            <span>{{ $duration }} tuần</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                @if($productDescription)
                                                    <div class="course-description">{{ \Illuminate\Support\Str::limit(clean_text($productDescription), 100) }}</div>
                                                @endif
                                                <div class="course-price">{{ $productPrice }}₫</div>
                                                <div class="course-buttons">
                                                    <a href="{{ $productCanonical }}" class="btn btn-buy">Xem chi tiết</a>
                                                    <button type="button" class="btn btn-cart addToCart" data-id="{{ $product->id }}">Mua ngay</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($products->hasPages())
                                    <div class="uk-text-center search-paginate">
                                        <ul class="pagination">
                                            {{-- Previous Page Link --}}
                                            @php
                                                $prevPageUrl = ($products->currentPage() > 1) ? $products->previousPageUrl() : null;
                                            @endphp
                                            @if ($prevPageUrl)
                                                <li class="page-item"><a class="page-link" href="{{ $prevPageUrl }}">Previous</a></li>
                                            @else
                                                <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                            @endif

                                            {{-- Pagination Links --}}
                                            @foreach ($products->getUrlRange(max(1, $products->currentPage() - 2), min($products->lastPage(), $products->currentPage() + 2)) as $page => $url)
                                                <li class="page-item {{ ($page == $products->currentPage()) ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @php
                                                $nextPageUrl = ($products->hasMorePages()) ? $products->nextPageUrl() : null;
                                            @endphp
                                            @if ($nextPageUrl)
                                                <li class="page-item"><a class="page-link" href="{{ $nextPageUrl }}">Next</a></li>
                                            @else
                                                <li class="page-item disabled"><span class="page-link">Next</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{-- Posts Section --}}
                    @if($hasPosts)
                        <div class="search-section mb40">
                            <h3 class="section-title mb20">Bài viết ({{ $posts->total() }})</h3>
                            <div class="post-list mb30">
                                <div class="uk-grid uk-grid-medium">
                                    @foreach($posts as $post)
                                        <div class="uk-width-small-1-2 uk-width-medium-1-3 mb20">
                                            <div class="post-card">
                                                <a href="{{ write_url($post->canonical) }}" class="post-image">
                                                    @if($post->image)
                                                        <img src="{{ asset($post->image) }}" alt="{{ $post->name }}">
                                                    @else
                                                        <div class="image-placeholder">
                                                            <i class="fa fa-file-text"></i>
                                                        </div>
                                                    @endif
                                                </a>
                                                <div class="post-content">
                                                    <div class="post-date">{{ date('d/m/Y', strtotime($post->created_at)) }}</div>
                                                    <h4 class="post-title">
                                                        <a href="{{ write_url($post->canonical) }}">{{ $post->name }}</a>
                                                    </h4>
                                                    @if($post->description)
                                                        <p class="post-excerpt">{{ \Illuminate\Support\Str::limit(clean_text($post->description), 100) }}</p>
                                                    @endif
                                                    <a href="{{ write_url($post->canonical) }}" class="post-read-more">Đọc thêm</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($posts->hasPages())
                                    <div class="uk-text-center search-paginate">
                                        <ul class="pagination">
                                            {{-- Previous Page Link --}}
                                            @php
                                                $prevPageUrl = ($posts->currentPage() > 1) ? $posts->previousPageUrl() : null;
                                            @endphp
                                            @if ($prevPageUrl)
                                                <li class="page-item"><a class="page-link" href="{{ $prevPageUrl }}">Previous</a></li>
                                            @else
                                                <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                            @endif

                                            {{-- Pagination Links --}}
                                            @foreach ($posts->getUrlRange(max(1, $posts->currentPage() - 2), min($posts->lastPage(), $posts->currentPage() + 2)) as $page => $url)
                                                <li class="page-item {{ ($page == $posts->currentPage()) ? 'active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @php
                                                $nextPageUrl = ($posts->hasMorePages()) ? $posts->nextPageUrl() : null;
                                            @endphp
                                            @if ($nextPageUrl)
                                                <li class="page-item"><a class="page-link" href="{{ $nextPageUrl }}">Next</a></li>
                                            @else
                                                <li class="page-item disabled"><span class="page-link">Next</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                @else
                    <div class="pt20 pb20">
                        <p>Không tìm thấy kết quả nào cho từ khóa "<strong>{{ $keyword }}</strong>"</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

