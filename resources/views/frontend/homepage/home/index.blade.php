@extends('frontend.homepage.layout')
@section('content')
    @include('frontend.component.slide')
    
    {{-- VSTEP Section --}}
    @if(isset($widgets['vstep-intro']) && $widgets['vstep-intro']->object && $widgets['vstep-intro']->object->isNotEmpty())
        @php
            $vstepPost = $widgets['vstep-intro']->object->first();
            $postName = $vstepPost->languages->name ?? '';
            $postDescription = $vstepPost->languages->description ?? '';
            $postContent = $vstepPost->languages->content ?? '';
            $image = $vstepPost->image ?? '';
        @endphp
        <div class="panel-vstep page-setup">
            <div class="uk-container uk-container-center">
                {{-- Top Section --}}
                <div class="vstep-header">
                    <div class="vstep-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">HIỂU ĐÚNG KỲ THI</div>
                    <h2 class="vstep-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $postName }}</h2>
                    <p class="vstep-description wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s">
                        {!! $postDescription !!}
                    </p>
                </div>
                
                {{-- Main Content --}}
                <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                    {{-- Left: VSTEP Details --}}
                    <div class="uk-width-medium-1-2">
                        <div class="vstep-content wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.4s">
                            {!! $postContent !!} 
                        </div>
                    </div>
                    
                    {{-- Right: Certificate Template --}}
                    <div class="uk-width-medium-1-2">
                        <div class="vstep-certificate wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.4s">
                            <img src="{{ $image }}" alt="VSTEP Certificate Template" class="certificate-image">
                        </div>
                    </div>
                </div>
                
                <div class="vstep-statistics">
                    <div class="uk-grid uk-grid-medium" data-uk-grid-match="">
                        <div class="uk-width-medium-1-2">
                            <div class="stat-box stat-box-a">
                                <div class="stat-header">Bậc A1 - A2</div>
                                
                                <div class="stat-value">31%</div>
                                
                                <div class="stat-description">Sinh vi&ecirc;n đăng k&yacute; để đủ điều kiện tốt nghiệp.</div>
                            </div>
                        </div>
                        
                        <div class="uk-width-medium-1-2">
                            <div class="stat-box stat-box-b">
                                <div class="stat-header">Bậc B1 - B2</div>
                                    
                                <div class="stat-value">69%</div>
                                
                                <div class="stat-description">Gi&aacute;o vi&ecirc;n, c&ocirc;ng chức, nghi&ecirc;n cứu sinh v&agrave; nh&acirc;n sự doanh nghiệp.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    {{-- VSTEP Suitable Section --}}
    @if(isset($widgets['vstep-suitable']) && $widgets['vstep-suitable']->object && $widgets['vstep-suitable']->object->isNotEmpty())
        @php
            $suitableCatalogue = $widgets['vstep-suitable']->object->first();
            $catalogueName = $suitableCatalogue->languages->name ?? '';
            $catalogueDescription = $suitableCatalogue->languages->description ?? '';
            $posts = $suitableCatalogue->posts ?? collect();
            
            // Icon mapping - Font Awesome class names
            $iconMap = [
                'Sinh Viên Sắp Tốt Nghiệp' => 'fa-graduation-cap',
                'Công Chức & Viên Chức' => 'fa-briefcase',
                'Nghiên cứu sinh, học viên cao học' => 'fa-book',
                'Nhân Sự Doanh Nghiệp' => 'fa-globe',
                'Người Mất Gốc Tiếng Anh' => 'fa-rotate-right',
                'Người Đi làm' => 'fa-chart-line'
            ];
        @endphp
        <div class="panel-vstep-suitable page-setup">
            <div class="uk-container uk-container-center">
                <div class="suitable-header">
                    <div class="suitable-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">Phù Hợp với ai?</div>
                    <h2 class="suitable-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $catalogueName }}</h2>
                    <p class="suitable-subtitle wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s">{{ $catalogueDescription }}</p>
                </div>
                
                @if($posts->isNotEmpty())
                    <div class="suitable-cards">
                        <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                            @foreach($posts as $post)
                                @php
                                    // Handle languages - could be Collection or object
                                    $postLanguage = ($post->languages instanceof \Illuminate\Support\Collection) 
                                        ? $post->languages->first() 
                                        : (is_array($post->languages) ? (object)($post->languages[0] ?? []) : ($post->languages ?? (object)[]));
                                    $postName = $postLanguage->name ?? '';
                                    $postDescription = $postLanguage->description ?? '';
                                    $postCanonical = write_url($postLanguage->canonical ?? '');
                                    $iconClass = $iconMap[$postName] ?? 'fa-user';
                                @endphp
                                <div class="uk-width-medium-1-3 uk-width-small-1-2 mb25">
                                    <div class="suitable-card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ ($loop->index * 0.1) + 0.4 }}s">
                                        <div class="card-icon">
                                            <i class="fa {{ $iconClass }}"></i>
                                        </div>
                                        <h3 class="card-title">{{ $postName }}</h3>
                                        <p class="card-description">{{ $postDescription }}</p>
                                        <a href="{{ $postCanonical }}" class="card-link">
                                            → Học Ngay
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
    
    {{-- VSTEP Why Section --}}
    @if(isset($widgets['vstep-why']) && $widgets['vstep-why']->object && $widgets['vstep-why']->object->isNotEmpty())
        @php
            $whyCatalogue = $widgets['vstep-why']->object->first();
            $catalogueName = $whyCatalogue->languages->name ?? '';
            $catalogueDescription = $whyCatalogue->languages->description ?? '';
            $whyPosts = $whyCatalogue->posts ?? collect();
        @endphp
        <div class="panel-vstep-why page-setup">
            <div class="uk-container uk-container-center">
                <div class="why-header">
                    <div class="why-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">TẠI SAO LÀ VSTEP?</div>
                    <h2 class="why-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $catalogueName }}</h2>
                    <p class="why-subtitle wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s">{!! $catalogueDescription !!}</p>
                </div>
                
                @if($whyPosts->isNotEmpty())
                    <div class="why-cards">
                        <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                            @foreach($whyPosts as $index => $post)
                                @php
                                    // Handle languages - could be Collection or object
                                    $postLanguage = ($post->languages instanceof \Illuminate\Support\Collection) 
                                        ? $post->languages->first() 
                                        : (is_array($post->languages) ? (object)($post->languages[0] ?? []) : ($post->languages ?? (object)[]));
                                    $postName = $postLanguage->name ?? '';
                                    $postDescription = $postLanguage->description ?? '';
                                    $postImage = $post->image ?? '';
                                    $postNumber = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                                @endphp
                                <div class="uk-width-medium-1-3">
                                    <div class="why-card uk-flex uk-flex-col wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ ($index * 0.2) + 0.4 }}s">
                                        <div class="card-image">
                                            @if($postImage)
                                                <img src="{{ $postImage }}" alt="{{ $postName }}">
                                            @else
                                                <div class="image-placeholder">
                                                    <i class="fa fa-image"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <h3 class="card-title">{{ $postName }}</h3>
                                        <div class="card-description">{!! $postDescription !!}</div>
                                        <div class="card-number">{{ $postNumber }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
    
    {{-- VSTEP Advantages Section --}}
    @if(isset($widgets['vstep-advantages']) && $widgets['vstep-advantages']->object && $widgets['vstep-advantages']->object->isNotEmpty())
        @php
            $advantagesCatalogue = $widgets['vstep-advantages']->object->first();
            $catalogueName = $advantagesCatalogue->languages->name ?? '';
            $catalogueDescription = $advantagesCatalogue->languages->description ?? '';
            $catalogueImage = $advantagesCatalogue->image ?? '';
            $advantagesPosts = $advantagesCatalogue->posts ?? collect();
            
            // Icon mapping - Font Awesome class names
            $advantagesIconMap = [
                'Hình Thức Học Online Linh Hoạt' => 'fa-video-camera',
                'Phương Pháp Học Sáng Tạo' => 'fa-lightbulb-o',
                'Ngân Hàng Đề Thi Sát Thực' => 'fa-database',
                'Giáo Viên Kinh Nghiệm' => 'fa-user'
            ];
        @endphp
        <div class="panel-vstep-advantages page-setup">
            <div class="uk-container uk-container-center">
                <div class="advantages-header">
                    <div class="advantages-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">Ưu Điểm</div>
                    <h2 class="advantages-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $catalogueName }}</h2>
                    <p class="advantages-subtitle wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s">{!! $catalogueDescription !!}</p>
                </div>
                
                <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                    {{-- Left: Advantages List --}}
                    <div class="uk-width-medium-1-2">
                        @if($advantagesPosts->isNotEmpty())
                            <div class="advantages-list wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.4s">
                                @foreach($advantagesPosts as $post)
                                    @php
                                        // Handle languages - could be Collection or object
                                        $postLanguage = ($post->languages instanceof \Illuminate\Support\Collection) 
                                            ? $post->languages->first() 
                                            : (is_array($post->languages) ? (object)($post->languages[0] ?? []) : ($post->languages ?? (object)[]));
                                        $postName = $postLanguage->name ?? '';
                                        $postDescription = $postLanguage->description ?? '';
                                        $iconClass = $advantagesIconMap[$postName] ?? 'fa-check';
                                    @endphp
                                    <div class="advantage-item wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="{{ ($loop->index * 0.1) + 0.5 }}s">
                                        <div class="advantage-icon">
                                            <i class="fa {{ $iconClass }}"></i>
                                        </div>
                                        <div class="advantage-content">
                                            <h3 class="advantage-title">{{ $postName }}</h3>
                                            <p class="advantage-description">{{ $postDescription }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    
                    {{-- Right: Image --}}
                    <div class="uk-width-medium-1-2">
                        <div class="advantages-image wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.4s">
                            @if($catalogueImage)
                                <img src="{{ $catalogueImage }}" alt="{{ $catalogueName }}">
                            @else
                                <div class="image-placeholder">
                                    <i class="fa fa-image"></i>
                                    <p>Ảnh sẽ được cập nhật sau</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    {{-- VSTEP CTA Section --}}
    @if(isset($widgets['vstep-cta']) && $widgets['vstep-cta'])
        @php
            $ctaWidget = $widgets['vstep-cta'];
            $ctaData = null;
            
            // Get description data
            if (isset($ctaWidget->description) && is_array($ctaWidget->description)) {
                // Get language ID - try $language variable first, then config, then default to 1
                $langId = isset($language) ? $language : (config('apps.language.default') ?? 1);
                $description = $ctaWidget->description[$langId] ?? ($ctaWidget->description[1] ?? null);
                if ($description) {
                    $ctaData = is_string($description) ? json_decode($description, true) : $description;
                }
            }
            
            // Default values if no data
            $title = $ctaData['title'] ?? 'Sẵn sàng đạt chứng chỉ VSTEP chỉ sau';
            $titleHighlight = $ctaData['title_highlight'] ?? '6-12 tuần?';
            $subtitle = $ctaData['subtitle'] ?? 'Đăng ký ngay để nhận tư vấn miễn phí, test trình độ đầu vào và ưu đãi học phí lên tới 20% trong tháng 11.';
            $button1Text = $ctaData['button_1_text'] ?? 'Đăng ký tư vấn';
            $button1Link = $ctaData['button_1_link'] ?? '#';
            $button2Text = $ctaData['button_2_text'] ?? 'Đặt mua khóa học';
            $button2Link = $ctaData['button_2_link'] ?? '#';
        @endphp
        <div class="panel-vstep-cta page-setup">
            <div class="cta-card wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                <h2 class="cta-title">
                    <span class="cta-title-line1 wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.3s">{{ $title }}</span>
                    <span class="cta-title-line2 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s">{{ $titleHighlight }}</span>
                </h2>
                <p class="cta-subtitle wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">{{ $subtitle }}</p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-consult open-register-popup wow fadeInLeft" data-wow-duration="0.6s" data-wow-delay="0.6s">{{ $button1Text }}</a>
                    <a href="{{ $button2Link }}" class="btn btn-buy wow fadeInRight" data-wow-duration="0.6s" data-wow-delay="0.6s">{{ $button2Text }}</a>
                </div>
            </div>
        </div>
    @endif
    
    {{-- VSTEP Registration Form Section --}}
    <div class="panel-vstep-register page-setup">
        <div class="uk-container uk-container-center">
            <h2 class="promo-title"> bắt đầu chinh phục VSTEP ngay hôm nay</h2>
            <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                {{-- Left: Promotional Content --}}
                <div class="uk-width-medium-1-2">
                    <div class="register-promo wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                       
                        <div class="promo-graphic">
                           <img src="{{ asset('frontend/resources/img/form-bg.png') }}" alt="Promo Graphic">
                        </div>
                        <div class="promo-text">
                            <p>Hơn 10000 hv đã thành công lấy chứng chỉ tiếng anh A2 B1 B2</p>
                            <p>cấp tốc để phục vụ cho học tập, công việc.</p>
                            <p class="promo-question">Bạn có muốn trở thành người tiếp theo?</p>
                        </div>
                    </div>
                </div>
                
                {{-- Right: Registration Form --}}
                <div class="uk-width-medium-1-2">
                    @include('frontend.component.register-form')
                </div>
            </div>
        </div>
    </div>
    
    {{-- VSTEP Courses Section --}}
    @if(isset($widgets['vstep-courses']) && $widgets['vstep-courses']->object && $widgets['vstep-courses']->object->isNotEmpty())
        @php
            $coursesCatalogue = $widgets['vstep-courses']->object->first();
            $catalogueName = $coursesCatalogue->languages->name ?? '';
            $catalogueDescription = $coursesCatalogue->languages->description ?? '';
            $catalogueCanonical = $coursesCatalogue->languages->canonical ?? '';
            $catalogueUrl = write_url($catalogueCanonical);
            $courses = $coursesCatalogue->products ?? collect();
        @endphp
        <div class="panel-vstep-courses page-setup">
            <div class="uk-container uk-container-center">
                <div class="courses-header">
                    <div class="courses-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">KHÓA HỌC</div>
                    <h2 class="courses-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $catalogueName }}</h2>
                    <p class="courses-subtitle wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s">{{ $catalogueDescription }}</p>
                </div>
                
                @if($courses->isNotEmpty())
                    <div class="courses-grid">
                        @foreach($courses as $course)
                            @php
                                $courseLanguage = ($course->languages instanceof \Illuminate\Support\Collection) 
                                    ? $course->languages->first() 
                                    : (is_array($course->languages) ? (object)($course->languages[0] ?? []) : ($course->languages ?? (object)[]));
                                $courseName = $courseLanguage->name ?? '';
                                $courseDescription = $courseLanguage->description ?? '';
                                $courseCanonical = write_url($courseLanguage->canonical ?? '');
                                $coursePrice = number_format($course->price ?? 0, 0, ',', '.');
                                $courseRate = $course->rate ?? '';
                                $totalLesson = $course->total_lesson ?? 0;
                                $duration = $course->duration ?? 0;
                                $courseImage = $course->image ?? '';
                            @endphp
                            <div class="course-card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ ($loop->index * 0.1) }}s">
                                <div class="course-image">
                                    @if($courseImage)
                                        <img src="{{ $courseImage }}" alt="{{ $courseName }}">
                                    @else
                                        <div class="image-placeholder">
                                            <div class="vstep-logo">VSTEP</div>
                                        </div>
                                    @endif
                                    <div class="course-level">{{ $courseRate }}</div>
                                </div>
                                <div class="course-content">
                                    <h3 class="course-title">{{ $courseName }}</h3>
                                    <div class="course-info">
                                        <div class="info-item">
                                            <i class="fa fa-book"></i>
                                            <span>{{ $totalLesson }} bài học</span>
                                        </div>
                                        <div class="info-item">
                                            <i class="fa fa-calendar"></i>
                                            <span>{{ $duration }} tuần</span>
                                        </div>
                                    </div>
                                    <p class="course-description">{!! $courseDescription !!}</p>
                                    <div class="course-price">{{ $coursePrice }}₫</div>
                                    <div class="course-buttons">
                                        <a href="{{ $courseCanonical }}" class="btn btn-buy">Mua Khóa</a>
                                        <button type="button" class="btn btn-cart addToCart" data-id="{{ $course->id }}">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                
                <div class="courses-footer">
                    <a href="{{ $catalogueUrl }}" class="btn-view-more wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.7s">Xem thêm</a>
                </div>
            </div>
        </div>
    @endif
    
    {{-- VSTEP Service Section --}}
    @if(isset($widgets['vstep-service']) && $widgets['vstep-service']->object && $widgets['vstep-service']->object->isNotEmpty())
        @php
            $serviceCatalogue = $widgets['vstep-service']->object->first();
            $catalogueName = $serviceCatalogue->languages->name ?? '';
            $catalogueDescription = $serviceCatalogue->languages->description ?? '';
            $catalogueCanonical = $serviceCatalogue->languages->canonical ?? '';
            $catalogueUrl = write_url($catalogueCanonical);
            $services = $serviceCatalogue->products ?? collect();
        @endphp
        <div class="panel-vstep-service page-setup">
            <div class="uk-container uk-container-center">
                <div class="service-header">
                    <div class="service-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">DỊCH VỤ</div>
                    <h2 class="service-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $catalogueName }}</h2>
                    <p class="service-subtitle wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s">{{ $catalogueDescription }}</p>
                </div>
                
                @if($services->isNotEmpty())
                    <div class="service-slider">
                        <div class="swiper-container service-swiper">
                            <div class="swiper-wrapper">
                                @foreach($services as $service)
                                    @php
                                        $serviceLanguage = ($service->languages instanceof \Illuminate\Support\Collection) 
                                            ? $service->languages->first() 
                                            : (is_array($service->languages) ? (object)($service->languages[0] ?? []) : ($service->languages ?? (object)[]));
                                        $serviceName = $serviceLanguage->name ?? '';
                                        $serviceDescription = $serviceLanguage->description ?? '';
                                        $serviceCanonical = write_url($serviceLanguage->canonical ?? '');
                                        $servicePrice = number_format($service->price ?? 0, 0, ',', '.');
                                        $serviceRate = $service->rate ?? '';
                                        $serviceFeatures = $serviceRate ? explode(', ', $serviceRate) : [];
                                        $serviceImage = $service->image ?? '';
                                    @endphp
                                    <div class="swiper-slide">
                                        <div class="service-card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ ($loop->index * 0.1) }}s">
                                            <div class="service-card-content">
                                                <div class="service-card-image">
                                                    @if($serviceImage)
                                                        <img src="{{ $serviceImage }}" alt="{{ $serviceName }}">
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
                                                    <h3 class="service-card-title">{{ $serviceName }}</h3>
                                                    <div class="service-features">
                                                        @foreach($serviceFeatures as $feature)
                                                            <div class="feature-tag">{{ trim($feature) }}</div>
                                                        @endforeach
                                                    </div>
                                                    <p class="service-card-description">{{ $serviceDescription }}</p>
                                                    <div class="service-price">{{ $servicePrice }}₫ /combo</div>
                                                </div>
                                            </div>
                                            <div class="service-buttons">
                                                <button type="button" class="btn btn-cart addToCart" data-id="{{ $service->id }}">THÊM VÀO GIỎ HÀNG</button>
                                                <a href="{{ $serviceCanonical }}" class="btn btn-buy">MUA NGAY</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-prev service-prev"></div>
                            <div class="swiper-button-next service-next"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
    
    {{-- Partners Section --}}
    @if(isset($slides['partner']) && isset($slides['partner']['item']) && !empty($slides['partner']['item']))
        @php
            $partnerItems = $slides['partner']['item'] ?? [];
        @endphp
        <div class="panel-partners page-setup">
            <div class="uk-container uk-container-center">
                <div class="partners-header">
                    <div class="partners-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">ĐỐI TÁC</div>
                    <h2 class="partners-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Các Đơn Vị Được Cấp Phép Tổ Chức Thi Chứng Chỉ VSTEP</h2>
                    <p class="partners-subtitle wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s">36 trường đại học và viện nghiên cứu hàng đầu được ủy quyền tổ chức kỳ thi chứng chỉ VSTEP theo tiêu chuẩn quốc gia</p>
                </div>
                
                @if(!empty($partnerItems))
                    <div class="partners-slider">
                        <div class="swiper-container partners-swiper">
                            <div class="swiper-wrapper">
                                @foreach($partnerItems as $key => $item)
                                    @php
                                        $itemImage = $item['image'] ?? '';
                                        $itemName = $item['name'] ?? '';
                                        $itemAlt = $item['alt'] ?? $itemName;
                                    @endphp
                                    @if($key % 2 === 0)
                                        <div class="swiper-slide">
                                    @endif
                                    <div class="partners-grid">
                                        <div class="partner-card wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="{{ ($key % 2) * 0.1 + 0.4 }}s">
                                            <div class="partner-logo">
                                                @if($itemImage)
                                                    <img src="{{ $itemImage }}" alt="{{ $itemAlt }}">
                                                @else
                                                    <div class="logo-placeholder"></div>
                                                @endif
                                            </div>
                                            <div class="partner-name">{{ $itemName }}</div>
                                        </div>
                                    </div>
                                    @if(($key + 1) % 2 === 0 || $key === count($partnerItems) - 1)
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="swiper-button-prev partners-prev"></div>
                            <div class="swiper-button-next partners-next"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
    
    {{-- Feedback Section --}}
    @if(isset($widgets['vstep-feedback']) && $widgets['vstep-feedback']->object && $widgets['vstep-feedback']->object->isNotEmpty())
        @php
            $feedbackCatalogue = $widgets['vstep-feedback']->object->first();
            $feedbackPosts = $feedbackCatalogue->posts ?? collect();
        @endphp
        <div class="panel-feedback page-setup">
            <div class="uk-container uk-container-center">
                <div class="feedback-header">
                    <div class="feedback-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">FEEDBACK TỪ HỌC VIÊN</div>
                    <h2 class="feedback-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Feedback học viên đã đạt chứng chỉ VSTEP</h2>
                    <p class="feedback-subtitle wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s">Minh chứng thực tế – đảm bảo bạn có thể tin tưởng đầu tư thời gian và chi phí.</p>
                </div>
                
                @if($feedbackPosts->isNotEmpty())
                    <div class="feedback-slider">
                        <div class="swiper-container feedback-swiper">
                            <div class="swiper-wrapper">
                                @foreach($feedbackPosts as $post)
                                    @php
                                        $postLanguage = ($post->languages instanceof \Illuminate\Support\Collection) 
                                            ? $post->languages->first() 
                                            : (is_array($post->languages) ? (object)($post->languages[0] ?? []) : ($post->languages ?? (object)[]));
                                        $postName = $postLanguage->name ?? '';
                                        $postDescription = $postLanguage->description ?? '';
                                        $postContent = $postLanguage->content ?? '';
                                        
                                        // Parse content từ format: <p>initials|affiliation|certificate</p>
                                        $initials = substr($postName, 0, 2);
                                        $affiliation = '';
                                        $certificate = 'Đạt VSTEP';
                                        
                                        if ($postContent) {
                                            // Lấy nội dung trong thẻ <p>
                                            preg_match('/<p>(.*?)<\/p>/', $postContent, $matches);
                                            if (!empty($matches[1])) {
                                                $parts = explode('|', $matches[1]);
                                                if (isset($parts[0])) $initials = trim($parts[0]);
                                                if (isset($parts[1])) $affiliation = trim($parts[1]);
                                                if (isset($parts[2])) $certificate = trim($parts[2]);
                                            }
                                        }
                                    @endphp
                                    <div class="swiper-slide">
                                        <div class="feedback-card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ ($loop->index * 0.1) + 0.4 }}s">
                                            <div class="feedback-quote">
                                                <span class="quote-mark">"</span>
                                                <p>{{ $postDescription }}</p>
                                            </div>
                                            <div class="feedback-badge">
                                                <span class="badge-icon">✓</span>
                                                <span class="badge-text">{{ $certificate }}</span>
                                            </div>
                                            <div class="feedback-author">
                                                <div class="author-avatar">
                                                    <span>{{ $initials }}</span>
                                                </div>
                                                <div class="author-info">
                                                    <div class="author-name">{{ $postName }}</div>
                                                    <div class="author-affiliation">{{ $affiliation }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-prev feedback-prev"></div>
                            <div class="swiper-button-next feedback-next"></div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
    
    {{-- News Section --}}
    @if(isset($widgets['vstep-news']) && $widgets['vstep-news']->object && $widgets['vstep-news']->object->isNotEmpty())
        @php
            $newsCatalogue = $widgets['vstep-news']->object->first();
            $newsPosts = $newsCatalogue->posts ?? collect();
            $newsCanonical = $newsCatalogue->languages->canonical ?? '';
            $newsUrl = $newsCanonical ? write_url($newsCanonical) : '#';
        @endphp
        <div class="panel-news page-setup">
            <div class="uk-container uk-container-center">
                <div class="news-header">
                    <div class="news-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">TIN TỨC NỔI BẬT</div>
                    <h2 class="news-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $newsCatalogue->languages->name ?? 'Cập nhật mới nhất về VSTEP & lịch thi' }}</h2>
                    <p class="news-subtitle wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s">{{ $newsCatalogue->languages->description ?? 'Bám sát thông tin chính thống từ Bộ GD&ĐT và kinh nghiệm ôn thi từ đội ngũ giám khảo.' }}</p>
                </div>
                
                @if($newsPosts->isNotEmpty())
                    <div class="news-grid">
                        @foreach($newsPosts->take(3) as $post)
                            @php
                                $postLanguage = ($post->languages instanceof \Illuminate\Support\Collection) 
                                    ? $post->languages->first() 
                                    : (is_array($post->languages) ? (object)($post->languages[0] ?? []) : ($post->languages ?? (object)[]));
                                $postName = $postLanguage->name ?? '';
                                $postDescription = $postLanguage->description ?? '';
                                $postCanonical = $postLanguage->canonical ?? '';
                                $postUrl = $postCanonical ? write_url($postCanonical) : '#';
                                $postImage = $post->image ?? '';
                                $postContent = $postLanguage->content ?? '';
                                
                                // Parse date từ content: <p>2025-11-13</p>
                                $postDate = '';
                                if ($postContent) {
                                    preg_match('/<p>(.*?)<\/p>/', $postContent, $matches);
                                    if (!empty($matches[1])) {
                                        $dateStr = trim($matches[1]);
                                        if (strtotime($dateStr)) {
                                            $postDate = date('d/m/Y', strtotime($dateStr));
                                        }
                                    }
                                }
                            @endphp
                            <div class="news-card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ ($loop->index * 0.1) + 0.4 }}s">
                                <a href="{{ $postUrl }}" class="news-card-link">
                                    <div class="news-card-image">
                                        @if($postImage)
                                            <img src="{{ $postImage }}" alt="{{ $postName }}">
                                        @else
                                            <div class="image-placeholder"></div>
                                        @endif
                                    </div>
                                    <div class="news-card-content">
                                        @if($postDate)
                                            <div class="news-date">{{ $postDate }}</div>
                                        @endif
                                        <h3 class="news-card-title">{{ $postName }}</h3>
                                        <p class="news-card-description">{{ $postDescription }}</p>
                                        <div class="news-read-more">Đọc thêm</div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="news-footer">
                        <a href="{{ $newsUrl }}" class="btn-view-more wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.7s">Xem thêm</a>
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection
