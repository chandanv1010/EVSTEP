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
                                <div class="uk-grid uk-grid-medium">
                                    @foreach($products as $product)
                                        <div class="uk-width-small-1-2 uk-width-medium-1-4 mb20">
                                            @include('frontend.component.p-item', ['product'  => $product])
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
                                                        <p class="post-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($post->description), 100) }}</p>
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

