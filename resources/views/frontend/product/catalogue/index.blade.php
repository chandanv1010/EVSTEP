@extends('frontend.homepage.layout')
@section('content')
    {{-- Breadcrumb --}}
    @include('frontend.component.breadcrumb-hero', [
        'model' => $productCatalogue,
        'breadcrumb' => $breadcrumb,
        'title' => $productCatalogue->name,
        'subtitle' => !empty($productCatalogue->description) ? \Illuminate\Support\Str::limit(clean_text($productCatalogue->description), 140) : null,
    ])
    
    <div class="product-catalogue-page page-wrapper">
        <div class="uk-container uk-container-center">
            @php
                // Phân biệt 2 loại danh mục
                $catalogueName = strtolower($productCatalogue->name ?? '');
                $isServiceType = (strpos($catalogueName, 'dịch vụ') !== false || strpos($catalogueName, 'chấm') !== false || strpos($catalogueName, 'chữa đề') !== false);
                $isCourseType = (strpos($catalogueName, 'khóa học') !== false || strpos($catalogueName, 'luyện thi') !== false);
                
                // Mặc định là course type nếu không phải service
                $displayType = $isServiceType ? 'service' : 'course';
                
                // Tổng số sản phẩm
                $totalProducts = $products->total() ?? 0;
            @endphp
            
            {{-- Products Count --}}
            @if($totalProducts > 0)
                <div class="products-count">
                    <span>Tìm thấy <strong>{{ $totalProducts }}</strong> {{ $totalProducts == 1 ? 'sản phẩm' : 'sản phẩm' }}</span>
                </div>
            @endif
            
            {{-- Products List with Sidebar --}}
            @if (!is_null($products) && $products->count() > 0)
                <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                    {{-- Left: Products 3/4 --}}
                    <div class="uk-width-medium-3-4">
                        {{-- Loại khóa học - sử dụng course-card --}}
                        <div class="courses-grid">
                            @foreach ($products as $product)
                                @php
                                    // Dữ liệu từ paginate có name và canonical trực tiếp từ select (tb2.name, tb2.canonical)
                                    $productName = $product->name ?? '';
                                    $productCanonical = write_url($product->canonical ?? '');
                                    $productPrice = number_format($product->price ?? 0, 0, ',', '.');
                                    $productRate = $product->rate ?? '';
                                    $totalLesson = $product->total_lesson ?? 0;
                                    $duration = $product->duration ?? 0;
                                    $productImage = $product->image ?? '';
                                    
                                    // Description phải lấy từ languages relationship (không có trong paginateSelect)
                                    $productDescription = '';
                                    if (isset($product->languages) && $product->languages instanceof \Illuminate\Support\Collection && $product->languages->isNotEmpty()) {
                                        $productLanguage = $product->languages->first();
                                        $productDescription = $productLanguage->pivot->description ?? '';
                                    }
                                @endphp
                                <div class="course-card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ ($loop->index * 0.1) }}s">
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
                
                {{-- Pagination --}}
                @if ($products->hasPages())
                    <div class="pagination-wrapper">
                        @include('frontend.component.pagination', ['model' => $products])
                    </div>
                @endif
                    </div>

                    {{-- Right: Sidebar Banner 1/4 --}}
                    <div class="uk-width-medium-1-4">
                        <div class="catalogue-sidebar">
                            @php
                                $slide = \App\Models\Slide::where('publish', 2)
                                    ->where('keyword', 'banner-aside')
                                    ->first();
                                
                                $bannerImage = null;
                                $bannerLink = null;
                                
                                if($slide && $slide->item) {
                                    $slideItems = is_string($slide->item) ? json_decode($slide->item, true) : $slide->item;
                                    if(isset($slideItems['1']) && is_array($slideItems['1']) && count($slideItems['1']) > 0) {
                                        $bannerImage = $slideItems['1'][0]['image'] ?? null;
                                        $bannerLink = $slideItems['1'][0]['canonical'] ?? null;
                                    }
                                }
                            @endphp
                            
                            @if($bannerImage)
                                <div class="sidebar-banner">
                                    @if($bannerLink)
                                        <a href="{{ $bannerLink }}" target="_blank">
                                            <img src="{{ asset($bannerImage) }}" alt="{{ $slide->name ?? 'Banner' }}">
                                        </a>
                                    @else
                                        <img src="{{ asset($bannerImage) }}" alt="{{ $slide->name ?? 'Banner' }}">
                                    @endif
                                </div>
                            @else
                                <div class="sidebar-banner-placeholder">
                                    <div class="placeholder-content">
                                        <i class="fa fa-image"></i>
                                        <p>Banner Placeholder</p>
                                        <span>Thêm banner từ Slides với keyword "banner-aside"</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="no-products">
                    <p>Không có sản phẩm nào trong danh mục này.</p>
                </div>
            @endif
            
            {{-- Content --}}
            @if($productCatalogue->content)
                <div class="catalogue-content">
                    {!! $productCatalogue->content !!}
                </div>
            @endif
        </div>
    </div>
@endsection
