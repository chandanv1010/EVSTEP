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
    
    // Lecturer info
    $lecturer = $product->lecturers ?? null;
    
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
    @include('frontend.component.breadcrumb-hero', [
        'model' => $product,
        'breadcrumb' => $breadcrumb,
        'title' => $name,
    ])
    
    <div class="product-detail-page page-wrapper">
        <div class="uk-container uk-container-center">
            {{-- Row 1: Gallery + Product Info --}}
            <div class="product-detail-row-1">
                <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                    {{-- Left: Gallery --}}
                    <div class="uk-width-medium-1-2">
                        @php
                            $galleryItems = [];
                            
                            // Add main image first
                            if($image) {
                                $galleryItems[] = ['type' => 'image', 'content' => $image];
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
                            @if($image)
                                <div class="product-main-image">
                                    <img src="{{ asset($image) }}" alt="{{ $name }}" style="width: 100%; height: auto; border-radius: 12px;">
                                </div>
                            @endif
                            {{-- Comment slide gallery --}}
                            {{-- @if(count($galleryItems) > 0)
                                <div class="swiper product-gallery-swiper">
                                    <div class="swiper-wrapper">
                                        @foreach($galleryItems as $item)
                                            <div class="swiper-slide">
                                                @if($item['type'] === 'qrcode')
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
                            @endif --}}
                        </div>

                        {{-- Testimonials Marquee --}}
                        @php
                            $productReviews = $product->reviews()->where('status', 1)->get();
                        @endphp
                        @if($productReviews->isNotEmpty())
                            <div class="testimonials-marquee-section">
                                <div class="marquee-wrapper">
                                    <div class="marquee-content">
                                        @foreach($productReviews as $review)
                                            <div class="testimonial-card">
                                                <div class="quote-icon">"</div>
                                                <div class="testimonial-header">
                                                    @if($review->image)
                                                        <div class="avatar">
                                                            <img src="{{ $review->image }}" alt="{{ $review->fullname }}">
                                                        </div>
                                                    @else
                                                        <div class="avatar avatar-placeholder">
                                                            <span>{{ strtoupper(substr($review->fullname, 0, 1)) }}</span>
                                                        </div>
                                                    @endif
                                                    <div class="rating">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= floor($review->score))
                                                                <i class="fa fa-star"></i>
                                                            @elseif($i - 0.5 <= $review->score)
                                                                <i class="fa fa-star-half-o"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="testimonial-content">
                                                    <h4 class="reviewer-name">{{ $review->fullname }}</h4>
                                                    <p class="testimonial-text">{!! $review->description !!}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- Duplicate for seamless loop --}}
                                        @foreach($productReviews as $review)
                                            <div class="testimonial-card">
                                                <div class="quote-icon">"</div>
                                                <div class="testimonial-header">
                                                    @if($review->image)
                                                        <div class="avatar">
                                                            <img src="{{ $review->image }}" alt="{{ $review->fullname }}">
                                                        </div>
                                                    @else
                                                        <div class="avatar avatar-placeholder">
                                                            <span>{{ strtoupper(substr($review->fullname, 0, 1)) }}</span>
                                                        </div>
                                                    @endif
                                                    <div class="rating">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= floor($review->score))
                                                                <i class="fa fa-star"></i>
                                                            @elseif($i - 0.5 <= $review->score)
                                                                <i class="fa fa-star-half-o"></i>
                                                            @else
                                                                <i class="fa fa-star-o"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="testimonial-content">
                                                    <h4 class="reviewer-name">{{ $review->fullname }}</h4>
                                                    <p class="testimonial-text">{!! $review->description !!}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
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
                                <button type="button" class="btn btn-consult btn-register-red open-register-popup">
                                    <i class="fa fa-phone"></i>
                                    Nhận tư vấn
                                </button>
                                <button type="button" class="btn btn-add-cart addToCart" data-id="{{ $product->id }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    Mua ngay
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
            
            {{-- Row 2: Content (3/4) + Sidebar (1/4) --}}
            <div class="product-detail-row-2" id="product-detail-container">
                <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                    {{-- Left: Content 3/4 --}}
                    <div class="uk-width-medium-3-4">
                {{-- Content --}}
                @if($content)
                    <div class="product-content wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
                        <h2 class="content-title">Nội dung khóa học</h2>
                        <div class="content-body">
                            {!! $content !!}
                        </div>
                    </div>
                @endif

                {{-- Lecturer Section --}}
                @if($lecturer)
                    <div class="product-lecturer wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.35s">
                        <h2 class="lecturer-section-title">Giáo viên khóa học</h2>
                        <div class="lecturer-info-box">
                            <div class="lecturer-text">
                                <h3 class="lecturer-name-title">{{ $lecturer->name }}</h3>
                                @if(!empty($lecturer->experience))
                                    <div class="lecturer-experience">
                                        {!! $lecturer->experience !!}
                                    </div>
                                @endif
                            </div>
                            <div class="lecturer-image-box">
                                @if(!empty($lecturer->image))
                                    <img src="{{ $lecturer->image }}" alt="{{ $lecturer->name }}" class="lecturer-photo">
                                @else
                                    <div class="lecturer-photo-placeholder">
                                        <span>{{ strtoupper(substr($lecturer->name, 0, 1)) }}</span>
                                    </div>
                                @endif
                            </div>
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
                                    $relatedImage = $relatedProduct->image ?? '';
                                    $relatedPriceData = getPrice($relatedProduct);
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
                                                <p class="related-description">{{ \Illuminate\Support\Str::limit(clean_text($relatedDescription), 80) }}</p>
                                            @endif
                                            <div class="related-price">
                                                @if($relatedPriceData['priceSale'] > 0)
                                                    <div class="price-old">{{ number_format($relatedPriceData['price'], 0, ',', '.') }}₫</div>
                                                    <div class="price-sale">{{ number_format($relatedPriceData['priceSale'], 0, ',', '.') }}₫</div>
                                                    <div class="price-save">Tiết kiệm: {{ number_format($relatedPriceData['price'] - $relatedPriceData['priceSale'], 0, ',', '.') }}₫</div>
                                                @else
                                                    <div class="price-sale">{{ number_format($relatedPriceData['price'], 0, ',', '.') }}₫</div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                    </div>

                    {{-- Right: Sidebar 1/4 --}}
                    <div class="uk-width-medium-1-4">
                        <div class="product-sidebar" data-uk-sticky="{boundary: true,top:20}" style="height:100%;">
                            {{-- CTA Box --}}
                            <div class="sidebar-cta-box wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.3s">
                                {{-- CTA Button --}}
                                <a href="{{ $system['product_cta_cta_button_link'] ?? '#' }}" class="cta-button" target="_blank">
                                    <i class="fa fa-comment"></i>
                                    {{ $system['product_cta_cta_button_text'] ?? 'Nhắn VSTEP EASY ngay' }}
                                </a>

                                {{-- Overview Box --}}
                                <div class="overview-box">
                                    <h3 class="overview-title">{{ $system['product_cta_overview_title'] ?? 'Tổng quan khóa Xây dựng nền tảng' }}</h3>
                                    
                                    <ul class="overview-list">
                                        {{-- Item 1 --}}
                                        <li class="overview-item">
                                            <i class="fa fa-graduation-cap"></i>
                                            <span>{{ $system['product_cta_overview_item_1'] ?? 'Đầu ra: Lấy lại gốc ngữ pháp tiếng Anh cơ bản;' }}</span>
                                        </li>
                                        
                                        {{-- Item 2 --}}
                                        <li class="overview-item">
                                            <i class="fa fa-calendar"></i>
                                            <span>{{ $system['product_cta_overview_item_2'] ?? 'Học online bất cứ khi nào có thiết bị kết nối internet;' }}</span>
                                        </li>
                                        
                                        {{-- Item 3 --}}
                                        <li class="overview-item">
                                            <i class="fa fa-gift"></i>
                                            <span>{{ $system['product_cta_overview_item_3'] ?? 'Nội dung khoa học được thu sẵn và chia thành 12 video chủ đề;' }}</span>
                                        </li>
                                        
                                        {{-- Price --}}
                                        <li class="overview-item">
                                            <i class="fa fa-star"></i>
                                            <span><strong>Học phí:</strong> {{ $priceFormatted }}₫</span>
                                        </li>
                                    </ul>
                                    
                                    {{-- Special Note --}}
                                    @if(!empty($system['product_cta_overview_item_4']))
                                        <div class="special-note">
                                            <strong>Đặc biệt:</strong> {{ $system['product_cta_overview_item_4'] }}
                                        </div>
                                    @else
                                        <div class="special-note">
                                            <strong>Đặc biệt:</strong> Tặng miễn phí khóa Xây dựng nền tảng cho những học viên đăng ký khóa Chinh phục B1 và Bứt phá B2;
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
/* Product Detail Row 2 - Layout 3/4 - 1/4 */
.product-detail-row-2 {
    margin-top: 60px;
}

/* Lecturer Section */
.product-lecturer {
    background: #fff;
    border-radius: 16px;
    padding: 35px;
    margin-bottom: 30px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.lecturer-section-title {
    font-size: 26px;
    font-weight: 700;
    color: #000;
    margin-bottom: 25px;
}

.lecturer-info-box {
    display: flex;
    gap: 30px;
    align-items: flex-start;
}

.lecturer-text {
    flex: 1;
}

.lecturer-name-title {
    font-size: 20px;
    font-weight: 700;
    color: #000;
    margin-bottom: 20px;
}

.lecturer-experience {
    font-size: 15px;
    line-height: 1.7;
    color: #555;
}

.lecturer-experience ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.lecturer-experience ul li {
    padding-left: 25px;
    margin-bottom: 12px;
    position: relative;
}

.lecturer-experience ul li:before {
    content: "•";
    position: absolute;
    left: 0;
    color: #E85923;
    font-size: 20px;
    line-height: 1;
}

.lecturer-image-box {
    flex-shrink: 0;
    width: 220px;
}

.lecturer-photo {
    width: 100%;
    height: auto;
    border-radius: 12px;
    border: 4px solid #E3F2FD;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}

.lecturer-photo-placeholder {
    width: 100%;
    aspect-ratio: 3/4;
    background: linear-gradient(135deg, #E85923 0%, #ff7043 100%);
    border-radius: 12px;
    border: 4px solid #E3F2FD;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}

.lecturer-photo-placeholder span {
    font-size: 80px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.product-detail-row-2 > .uk-container {
    position: relative;
}

.product-detail-row-2 .uk-grid {
    align-items: flex-start !important;
}

.product-detail-row-2 .uk-width-medium-1-4 {
    position: relative;
}

/* Sidebar Styles */
.product-sidebar {
    position: relative;
}

.sidebar-cta-box {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    max-height: calc(100vh - 100px);
}

.product-detail-row-2 .product-sidebar.uk-sticky {
    bottom: auto !important;
}

.product-detail-row-2 .uk-width-medium-1-4 {
    align-self: flex-start;
}

/* CTA Button - Orange Header */
.cta-button {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 10px;
    padding: 16px 20px;
    background: #E85923;
    color: #fff;
    font-size: 16px;
    font-weight: 700;
    text-decoration: none;
    transition: background 0.3s ease;
    border: none;
    cursor: pointer;
}

.cta-button:hover {
    background: #d94d1a;
    color: #fff;
}

.cta-button i {
    font-size: 18px;
}

/* Overview Box - White Content */
.overview-box {
    padding: 24px 20px;
    background: #fff;
}

.overview-title {
    font-size: 18px;
    font-weight: 700;
    color: #000;
    margin-bottom: 20px;
    line-height: 1.4;
}

/* Overview List */
.overview-list {
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
}

.overview-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 12px 0;
    color: #333;
    font-size: 14px;
    line-height: 1.6;
}

.overview-item i {
    font-size: 18px;
    color: #E85923;
    margin-top: 2px;
    flex-shrink: 0;
    width: 20px;
    text-align: center;
}

.overview-item span {
    flex: 1;
    color: #333;
}

.overview-item strong {
    color: #000;
}

/* Special Note */
.special-note {
    padding: 12px 0;
    font-size: 14px;
    line-height: 1.6;
    color: #333;
}

.special-note strong {
    color: #000;
}

/* Responsive */
@media (max-width: 959px) {
    .product-detail-row-2 .uk-width-medium-3-4,
    .product-detail-row-2 .uk-width-medium-1-4 {
        width: 100% !important;
    }

    .sidebar-cta-box {
        position: relative;
        top: 0;
        margin-bottom: 30px;
    }

    .product-detail-row-2 {
        margin-top: 40px;
    }
}

@media (max-width: 767px) {
    .sidebar-cta-box {
        border-radius: 12px;
    }

    .overview-box {
        padding: 20px 16px;
    }

    .overview-title {
        font-size: 16px;
        margin-bottom: 16px;
    }

    .cta-button {
        font-size: 15px;
        padding: 14px 16px;
    }

    .overview-item {
        font-size: 13px;
        padding: 10px 0;
    }

    .overview-item i {
        font-size: 16px;
    }

    .special-note {
        font-size: 13px;
        padding: 10px 0;
    }

    .product-lecturer {
        padding: 25px 20px;
    }

    .lecturer-section-title {
        font-size: 22px;
    }

    .lecturer-info-box {
        flex-direction: column-reverse;
        gap: 20px;
    }

    .lecturer-image-box {
        width: 100%;
        max-width: 200px;
        margin: 0 auto;
    }

    .lecturer-name-title {
        font-size: 18px;
    }

    .lecturer-experience {
        font-size: 14px;
    }

    .lecturer-photo-placeholder span {
        font-size: 60px;
    }
}
</style>

@endsection
