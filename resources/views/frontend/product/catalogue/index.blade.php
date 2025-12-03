@extends('frontend.homepage.layout')
@section('content')
    {{-- Breadcrumb --}}
    @include('frontend.component.breadcrumb', ['model' => $productCatalogue, 'breadcrumb' => $breadcrumb])
    
    <div class="product-catalogue-page page-wrapper">
        <div class="uk-container uk-container-center">
            {{-- Header --}}
            <div class="catalogue-header">
                <h1 class="catalogue-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">{{ $productCatalogue->name }}</h1>
                @if($productCatalogue->description)
                    <div class="catalogue-description wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
                        {!! $productCatalogue->description !!}
                    </div>
                @endif
            </div>
            
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
            
            {{-- Products List --}}
            @if (!is_null($products) && $products->count() > 0)
                @if($displayType === 'service')
                    {{-- Loại dịch vụ - sử dụng service-card --}}
                    <div class="service-grid">
                        @foreach ($products as $product)
                            @php
                                // Dữ liệu từ paginate có name và canonical trực tiếp từ select (tb2.name, tb2.canonical)
                                $productName = $product->name ?? '';
                                $productCanonical = write_url($product->canonical ?? '');
                                $productPrice = number_format($product->price ?? 0, 0, ',', '.');
                                $productRate = $product->rate ?? '';
                                $serviceFeatures = $productRate ? explode(', ', $productRate) : [];
                                $productImage = $product->image ?? '';
                                
                                // Description phải lấy từ languages relationship (không có trong paginateSelect)
                                $productDescription = '';
                                if (isset($product->languages) && $product->languages instanceof \Illuminate\Support\Collection && $product->languages->isNotEmpty()) {
                                    $productLanguage = $product->languages->first();
                                    $productDescription = $productLanguage->pivot->description ?? '';
                                }
                            @endphp
                            <div class="service-card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ ($loop->index * 0.1) }}s">
                                <div class="service-card-content">
                                    <div class="service-card-image">
                                        @if($productImage)
                                            <img src="{{ asset($productImage) }}" alt="{{ $productName }}">
                                        @else
                                            <div class="image-placeholder">
                                                <div class="service-graphic">
                                                    <div class="combo-boxes">
                                                        <div class="combo-item">COMBO 3</div>
                                                        <div class="combo-item">COMBO 6</div>
                                                        <div class="combo-item">COMBO 10</div>
                                                    </div>
                                                    <div class="phone-graphic">
                                                        <div class="phone-screen">TEST</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="service-card-text">
                                        <h3 class="service-card-title">{{ $productName }}</h3>
                                        @if(!empty($serviceFeatures))
                                            <div class="service-features">
                                                @foreach($serviceFeatures as $feature)
                                                    <div class="feature-tag">{{ trim($feature) }}</div>
                                                @endforeach
                                            </div>
                                        @endif
                                        @if($productDescription)
                                            <p class="service-card-description">{{ \Illuminate\Support\Str::limit(strip_tags($productDescription), 150) }}</p>
                                        @endif
                                        <div class="service-price">{{ $productPrice }}₫ /combo</div>
                                    </div>
                                </div>
                                <div class="service-buttons">
                                    <a href="{{ $productCanonical }}" class="btn btn-cart">Xem chi tiết</a>
                                    <button type="button" class="btn btn-buy addToCart" data-id="{{ $product->id }}">Mua ngay</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
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
                                        <div class="course-description">{{ \Illuminate\Support\Str::limit(strip_tags($productDescription), 100) }}</div>
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
                @endif
                
                {{-- Pagination --}}
                @if ($products->hasPages())
                    <div class="pagination-wrapper">
                        @include('frontend.component.pagination', ['model' => $products])
                    </div>
                @endif
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
