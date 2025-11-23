@php
    $name = $product->name;
    $canonical = write_url($product->canonical);
    $image = $product->image;
    $price = getPrice($product);
    $description = $product->description;
    $content = $product->content;
    $gallery = json_decode($product->album, true) ?? [];
    $iframe = $product->iframe;
    $qrcode = $product->qrcode;
    $totalLesson = $product->total_lesson ?? 0;
    $duration = $product->duration ?? 0;
    $rate = $product->rate ?? '';
    $lessionContent = !is_null($product->lession_content) ? explode(',', $product->lession_content) : null;
    $total_time = !is_null($product->chapter) ? calculateCourses($product)['durationText'] : '';
    $totalLessons = collect($product->chapter)
        ->flatMap(fn ($chapter) => $chapter['content'] ?? [])
        ->count();
    $modelId = $product->id;
    
    // Format price
    $productPrice = $product->price ?? 0;
    $priceSale = ($price['priceSale'] > 0) ? $price['priceSale'] : $productPrice;
    $priceFormatted = number_format($priceSale, 0, ',', '.');
    $priceOld = ($price['priceSale'] > 0) ? $price['price'] : null;
    $priceOldFormatted = $priceOld ? number_format($priceOld, 0, ',', '.') : null;
@endphp
@extends('frontend.homepage.layout')
@section('content')
    {{-- Breadcrumb --}}
    @include('frontend.component.breadcrumb', ['model' => $product, 'breadcrumb' => $breadcrumb])
    
    <div class="product-detail-page page-wrapper">
        <div class="uk-container uk-container-center">
            {{-- Row 1: Gallery + Product Info --}}
            <div class="product-detail-row-1">
                <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                    {{-- Left: Gallery --}}
                    <div class="uk-width-medium-1-2">
                        @php
                            $galleryItems = [];
                            
                            // Add video/iframe first
                            if($iframe) {
                                $galleryItems[] = ['type' => 'video', 'content' => $iframe];
                            } elseif($image) {
                                $galleryItems[] = ['type' => 'video-preview', 'content' => $image];
                            }
                            
                            // Add gallery images
                            if(!empty($gallery) && is_array($gallery)) {
                                foreach($gallery as $galleryImage) {
                                    $galleryItems[] = ['type' => 'image', 'content' => $galleryImage];
                                }
                            }
                            
                            // Add QR code last (chỉ thêm QR nếu có)
                            if($qrcode) {
                                $galleryItems[] = ['type' => 'qrcode', 'content' => $qrcode];
                            }
                        @endphp
                        <div class="product-gallery wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.1s">
                            @if(count($galleryItems) > 0)
                                <div class="swiper product-gallery-swiper">
                                    <div class="swiper-wrapper">
                                        @foreach($galleryItems as $item)
                                            <div class="swiper-slide">
                                                @if($item['type'] === 'video')
                                                    <div class="gallery-item gallery-video">
                                                        <div class="video-wrapper">
                                                            {!! $item['content'] !!}
                                                        </div>
                                                    </div>
                                                @elseif($item['type'] === 'video-preview')
                                                    <div class="gallery-item gallery-video-preview">
                                                        <div class="video-preview">
                                                            <img src="{{ asset($item['content']) }}" alt="{{ $name }}">
                                                            <div class="video-overlay">
                                                                <div class="play-icon">
                                                                    <i class="fa fa-play-circle"></i>
                                                                </div>
                                                                <p>Video giới thiệu</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($item['type'] === 'qrcode')
                                                    <div class="gallery-item gallery-qrcode">
                                                        <div class="qrcode-wrapper">
                                                            {!! $item['content'] !!}
                                                            <p class="qrcode-label">Quét mã QR để xem thêm</p>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="gallery-item">
                                                        <img src="{{ asset($item['content']) }}" alt="{{ $name }}">
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    @if(count($galleryItems) > 1)
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    {{-- Right: Product Info --}}
                    <div class="uk-width-medium-1-2">
                        <div class="product-info wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            <h1 class="product-title">{{ $name }}</h1>
                            
                            {{-- Course Info --}}
                            <div class="product-course-info">
                                <ul class="info-list">
                                    @if($totalLesson > 0)
                                        <li>
                                            <i class="fa fa-book"></i>
                                            <span>{{ $totalLesson }} bài học</span>
                                        </li>
                                    @endif
                                    @if($duration > 0)
                                        <li>
                                            <i class="fa fa-calendar"></i>
                                            <span>{{ $duration }} tuần</span>
                                        </li>
                                    @endif
                                    @if($total_time)
                                        <li>
                                            <i class="fa fa-clock-o"></i>
                                            <span>Thời gian: {{ $total_time }}</span>
                                        </li>
                                    @endif
                                    @if($totalLessons > 0)
                                        <li>
                                            <i class="fa fa-list"></i>
                                            <span>{{ $totalLessons }} bài giảng</span>
                                        </li>
                                    @endif
                                    @if($rate)
                                        <li>
                                            <i class="fa fa-star"></i>
                                            <span>Trình độ: {{ $rate }}</span>
                                        </li>
                                    @endif
                                    @if(!is_null($lessionContent) && is_array($lessionContent) && count($lessionContent))
                                        @foreach($lessionContent as $contentItem)
                                            <li>
                                                <i class="fa fa-check"></i>
                                                <span>{{ $contentItem }}</span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            
                            @if($description)
                                <div class="product-description">
                                    {!! $description !!}
                                </div>
                            @endif
                            
                            <div class="product-price-section">
                                @if($priceOldFormatted && $priceOld > $priceSale)
                                    <div class="price-old">{{ $priceOldFormatted }}₫</div>
                                    <div class="price-new">{{ $priceFormatted }}₫</div>
                                    @if($price['percent'] > 0)
                                        <div class="price-save">Tiết kiệm: {{ number_format($priceOld - $priceSale, 0, ',', '.') }}₫</div>
                                    @endif
                                @else
                                    <div class="price-new">{{ $priceFormatted }}₫</div>
                                @endif
                            </div>
                            
                            {{-- Quantity --}}
                            <div class="product-quantity">
                                <label class="quantity-label">Số lượng:</label>
                                <div class="quantity-controls">
                                    <button type="button" class="btn-qty minus">-</button>
                                    <input type="number" class="quantity-text input-qty" value="1" min="1">
                                    <button type="button" class="btn-qty plus">+</button>
                                </div>
                            </div>
                            
                            {{-- Action Buttons --}}
                            <div class="product-detail-actions">
                                <button type="button" class="btn btn-consult open-register-popup">
                                    <i class="fa fa-phone"></i>
                                    Nhận tư vấn
                                </button>
                                <button type="button" class="btn btn-add-cart addToCart" data-id="{{ $product->id }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    Thêm vào giỏ hàng
                                </button>
                            </div>
                            
                            @if($price['percent'] > 0 && isset($promotionLeft))
                                <div class="promotion-notice">
                                    ⏰ Ưu đãi kết thúc sau {{ $promotionLeft }} ngày
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Row 2: Content + Related Products --}}
            <div class="product-detail-row-2">
                {{-- Content --}}
                @if($content)
                    <div class="product-content wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                        <h2 class="content-title">Nội dung khóa học</h2>
                        <div class="content-body">
                            {!! $content !!}
                        </div>
                    </div>
                @endif
                
                {{-- Related Products --}}
                @if(isset($productRelated) && $productRelated->isNotEmpty())
                    <div class="product-related wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                        <h2 class="related-title">Khóa học liên quan</h2>
                        <div class="related-grid">
                            @foreach($productRelated as $relatedProduct)
                                @php
                                    $relatedLanguage = $relatedProduct->languages->first();
                                    $relatedName = $relatedLanguage->pivot->name ?? '';
                                    $relatedDescription = $relatedLanguage->pivot->description ?? '';
                                    $relatedCanonical = write_url($relatedLanguage->pivot->canonical ?? '');
                                    $relatedPrice = number_format($relatedProduct->price ?? 0, 0, ',', '.');
                                    $relatedImage = $relatedProduct->image ?? '';
                                @endphp
                                <div class="related-card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ ($loop->index * 0.1) + 0.5 }}s">
                                    <a href="{{ $relatedCanonical }}" class="related-link">
                                        <div class="related-image">
                                            @if($relatedImage)
                                                <img src="{{ asset($relatedImage) }}" alt="{{ $relatedName }}">
                                            @else
                                                <div class="image-placeholder">
                                                    <div class="vstep-logo">VSTEP</div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="related-content">
                                            <h3 class="related-name">{{ $relatedName }}</h3>
                                            @if($relatedDescription)
                                                <p class="related-description">{{ \Illuminate\Support\Str::limit(strip_tags($relatedDescription), 80) }}</p>
                                            @endif
                                            <div class="related-price">{{ $relatedPrice }}₫</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
