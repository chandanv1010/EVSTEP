@extends('frontend.homepage.layout')

@section('content')
    {{-- Khối 1: Hero Section với số liệu thống kê --}}
    @if(isset($introduce['block_1_label']) || isset($introduce['block_1_title']))
        @php
            $heroLabel = $introduce['block_1_label'] ?? '';
            $heroTitle = $introduce['block_1_title'] ?? '';
            $heroDescription = $introduce['block_1_description'] ?? '';
            $heroNumber1 = $introduce['block_1_number_1'] ?? '5200+';
            $heroText1 = $introduce['block_1_text_1'] ?? 'Học viên đạt VSTEP';
            $heroNumber2 = $introduce['block_1_number_2'] ?? '35';
            $heroText2 = $introduce['block_1_text_2'] ?? 'Giám khảo đồng hành';
            $heroNumber3 = $introduce['block_1_number_3'] ?? '92%';
            $heroText3 = $introduce['block_1_text_3'] ?? 'Đạt mục tiêu ngay lần đầu';
            $heroButton1 = $introduce['block_1_button_1'] ?? 'Xem giải pháp';
            $heroButton1Link = $introduce['block_1_button_1_link'] ?? '#';
            $heroButton2 = $introduce['block_1_button_2'] ?? 'Hành trình 10 năm';
            $heroButton2Link = $introduce['block_1_button_2_link'] ?? '#';
            $heroBackground = $introduce['block_1_background'] ?? '';
        @endphp
        <div class="intro-hero page-setup">
            <div class="uk-container uk-container-center">
                <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                    {{-- Left: Content --}}
                    <div class="uk-width-medium-1-2">
                        <div class="hero-content">
                            @if($heroLabel)
                                <div class="hero-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">{{ $heroLabel }}</div>
                            @endif
                            <h1 class="hero-title wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $heroTitle }}</h1>
                            <p class="hero-description wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.3s">{{ $heroDescription }}</p>
                            
                            <div class="hero-stats">
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-1-3">
                                        <div class="stat-item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s">
                                            <div class="stat-number" data-target="{{ preg_replace('/[^0-9]/', '', $heroNumber1) }}">{{ $heroNumber1 }}</div>
                                            <div class="stat-text">{{ $heroText1 }}</div>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-3">
                                        <div class="stat-item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">
                                            <div class="stat-number" data-target="{{ preg_replace('/[^0-9]/', '', $heroNumber2) }}">{{ $heroNumber2 }}</div>
                                            <div class="stat-text">{{ $heroText2 }}</div>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-3">
                                        <div class="stat-item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.6s">
                                            <div class="stat-number" data-target="{{ preg_replace('/[^0-9]/', '', $heroNumber3) }}">{{ $heroNumber3 }}</div>
                                            <div class="stat-text">{{ $heroText3 }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="hero-buttons">
                                <a href="{{ $heroButton1Link }}" class="btn btn-primary wow fadeInLeft" data-wow-duration="0.6s" data-wow-delay="0.7s">{{ $heroButton1 }}</a>
                                <a href="{{ $heroButton2Link }}" class="btn btn-secondary wow fadeInLeft" data-wow-duration="0.6s" data-wow-delay="0.8s">{{ $heroButton2 }}</a>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Right: Image --}}
                    <div class="uk-width-medium-1-2">
                        <div class="hero-image-wrapper wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                            @if($heroBackground)
                                <img src="{{ $heroBackground }}" alt="Hero Image" class="hero-image">
                            @else
                                <div class="hero-image-placeholder">
                                    <i class="fa fa-image"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Khối 2: Sứ mệnh --}}
    @if(isset($introduce['block_2_label']) || isset($introduce['block_2_title']))
        @php
            $missionLabel = $introduce['block_2_label'] ?? 'SỨ MỆNH';
            $missionTitle = $introduce['block_2_title'] ?? '';
            $missionDescription = $introduce['block_2_description'] ?? '';
            $missionContent = $introduce['block_2_content'] ?? '';
            $missionNumber1 = $introduce['block_2_number_1'] ?? '5.200+';
            $missionText1 = $introduce['block_2_text_1'] ?? 'Học viên đỗ VSTEP A1 - B2';
            $missionNumber2 = $introduce['block_2_number_2'] ?? '92%';
            $missionText2 = $introduce['block_2_text_2'] ?? 'Đạt mục tiêu ngay lần thi đầu tiên';
            $missionImage = $introduce['block_2_image'] ?? '';
            $missionOverlayLabel = $introduce['block_2_overlay_label'] ?? 'CAM KẾT ĐẦU RA';
            $missionOverlayTitle = $introduce['block_2_overlay_title'] ?? '';
            $missionOverlayDescription = $introduce['block_2_overlay_description'] ?? '';
        @endphp
        <div class="intro-mission page-setup">
            <div class="uk-container uk-container-center">
                <div class="mission-header">
                    @if($missionLabel)
                        <div class="mission-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">{{ $missionLabel }}</div>
                    @endif
                    <h2 class="mission-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $missionTitle }}</h2>
                    <p class="mission-description wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">{{ $missionDescription }}</p>
                </div>
                
                <div class="uk-grid uk-grid-medium">
                    {{-- Left: Content --}}
                    <div class="uk-width-medium-1-2">
                        <div class="mission-content-left">
                            @if($missionContent)
                                <div class="mission-content wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.4s">
                                    {!! $missionContent !!}
                                </div>
                            @endif
                            
                            {{-- Statistics Boxes --}}
                            <div class="mission-stats">
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-1-2">
                                        <div class="mission-stat-item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">
                                            <div class="stat-number" data-target="{{ preg_replace('/[^0-9]/', '', str_replace('.', '', $missionNumber1)) }}">{{ $missionNumber1 }}</div>
                                            <div class="stat-text">{{ $missionText1 }}</div>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <div class="mission-stat-item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.6s">
                                            <div class="stat-number" data-target="{{ preg_replace('/[^0-9]/', '', $missionNumber2) }}">{{ $missionNumber2 }}</div>
                                            <div class="stat-text">{{ $missionText2 }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Right: Image with Overlay --}}
                    <div class="uk-width-medium-1-2">
                        <div class="mission-image-wrapper wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.4s">
                            @if($missionImage)
                                <img src="{{ $missionImage }}" alt="Mission Image" class="mission-image">
                            @else
                                <div class="mission-image-placeholder">
                                    <i class="fa fa-image"></i>
                                </div>
                            @endif
                            
                            @if($missionOverlayTitle || $missionOverlayDescription)
                                <div class="mission-overlay wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.7s">
                                    @if($missionOverlayLabel)
                                        <div class="overlay-label">{{ $missionOverlayLabel }}</div>
                                    @endif
                                    @if($missionOverlayTitle)
                                        <h3 class="overlay-title">{{ $missionOverlayTitle }}</h3>
                                    @endif
                                    @if($missionOverlayDescription)
                                        <p class="overlay-description">{{ $missionOverlayDescription }}</p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Khối 3: Lộ trình --}}
    @if(isset($introduce['block_3_label']) || isset($introduce['block_3_title']))
        @php
            $roadmapLabel = $introduce['block_3_label'] ?? 'LỘ TRÌNH';
            $roadmapTitle = $introduce['block_3_title'] ?? '';
            $roadmapImage = $introduce['block_3_image'] ?? '';
            $overlayPrefix = $introduce['block_3_overlay_prefix'] ?? 'Áp dụng cho hơn';
            $overlayNumber = $introduce['block_3_overlay_number'] ?? '985/1000';
            $overlayText = $introduce['block_3_overlay_text'] ?? 'Học viên B2 – tháng 11/2025';
            $week0 = $introduce['block_3_week_0'] ?? '';
            $week1_2 = $introduce['block_3_week_1_2'] ?? '';
            $week3_4 = $introduce['block_3_week_3_4'] ?? '';
            $week5_6 = $introduce['block_3_week_5_6'] ?? '';
            $week7 = $introduce['block_3_week_7'] ?? '';
            $week8 = $introduce['block_3_week_8'] ?? '';
        @endphp
        <div class="intro-roadmap page-setup">
            <div class="uk-container uk-container-center">
                <div class="roadmap-header">
                    @if($roadmapLabel)
                        <div class="roadmap-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">{{ $roadmapLabel }}</div>
                    @endif
                    <h2 class="roadmap-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $roadmapTitle }}</h2>
                </div>
                
                <div class="uk-grid uk-grid-medium">
                    <div class="uk-width-medium-1-2">
                        <div class="roadmap-image-wrapper wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                            @if($roadmapImage)
                                <img src="{{ $roadmapImage }}" alt="Roadmap" class="roadmap-image">
                            @else
                                <div class="roadmap-image-placeholder">
                                    <i class="fa fa-image"></i>
                                </div>
                            @endif
                            <div class="roadmap-overlay wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">
                                @if($overlayPrefix)
                                    <div class="overlay-prefix">{{ $overlayPrefix }}</div>
                                @endif
                                <div class="overlay-number" data-target="{{ preg_replace('/[^0-9]/', '', explode('/', $overlayNumber)[0]) }}">{{ $overlayNumber }}</div>
                                @if($overlayText)
                                    <div class="overlay-text">{{ $overlayText }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- Right: Timeline --}}
                    <div class="uk-width-medium-1-2">
                        <div class="roadmap-timeline wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                            @if($week1_2)
                                <div class="timeline-item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s">
                                    <div class="timeline-content">
                                        <div class="timeline-bullet"></div>
                                        <div class="timeline-week">Tuần 1-2</div>
                                        <div class="timeline-description">{{ $week1_2 }}</div>
                                    </div>
                                </div>
                            @endif
                            @if($week3_4)
                                <div class="timeline-item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">
                                    <div class="timeline-content">
                                        <div class="timeline-bullet"></div>
                                        <div class="timeline-week">Tuần 3-4</div>
                                        <div class="timeline-description">{{ $week3_4 }}</div>
                                    </div>
                                </div>
                            @endif
                            @if($week5_6)
                                <div class="timeline-item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.6s">
                                    <div class="timeline-content">
                                        <div class="timeline-bullet"></div>
                                        <div class="timeline-week">Tuần 5-6</div>
                                        <div class="timeline-description">{{ $week5_6 }}</div>
                                    </div>
                                </div>
                            @endif
                            @if($week7)
                                <div class="timeline-item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.7s">
                                    <div class="timeline-content">
                                        <div class="timeline-bullet"></div>
                                        <div class="timeline-week">Tuần 7</div>
                                        <div class="timeline-description">{{ $week7 }}</div>
                                    </div>
                                </div>
                            @endif
                            @if($week8)
                                <div class="timeline-item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.8s">
                                    <div class="timeline-content">
                                        <div class="timeline-bullet"></div>
                                        <div class="timeline-week">Tuần 8</div>
                                        <div class="timeline-description">{{ $week8 }}</div>
                                    </div>
                                </div>
                            @endif
                            @if($week0)
                                <div class="timeline-item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.9s">
                                    <div class="timeline-content">
                                        <div class="timeline-bullet"></div>
                                        <div class="timeline-week">Tuần 9</div>
                                        <div class="timeline-description">{{ $week0 }}</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Khối 4: Ảnh thực tế --}}
    @if(isset($introduce['block_4_label']) || isset($introduce['block_4_title']))
        @php
            $realImagesLabel = $introduce['block_4_label'] ?? 'ẢNH THỰC TẾ';
            $realImagesTitle = $introduce['block_4_title'] ?? '';
            
            // Tạo mảng các ảnh từ introduce
            $realImagesItems = [];
            for($i = 1; $i <= 5; $i++) {
                $image = $introduce['block_4_image_' . $i] ?? '';
                $text = $introduce['block_4_text_' . $i] ?? '';
                
                if(!empty($image) || !empty($text)) {
                    $realImagesItems[] = [
                        'image' => $image,
                        'text' => $text,
                    ];
                }
            }
        @endphp
        <div class="intro-real-images page-setup">
            <div class="uk-container uk-container-center">
                <div class="real-images-header">
                    @if($realImagesLabel)
                        <div class="real-images-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">{{ $realImagesLabel }}</div>
                    @endif
                    <h2 class="real-images-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $realImagesTitle }}</h2>
                </div>
                
                @if(!empty($realImagesItems))
                    <div class="real-images-slider wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="swiper-container real-images-swiper">
                            <div class="swiper-wrapper">
                                @foreach($realImagesItems as $key => $item)
                                    <div class="swiper-slide">
                                        <div class="real-image-card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ 0.4 + ($key * 0.1) }}s">
                                            <div class="real-image-wrapper">
                                                @if(!empty($item['image']))
                                                    <img src="{{ $item['image'] }}" alt="Real Image {{ $key + 1 }}" class="real-image">
                                                @else
                                                    <div class="real-image-placeholder">
                                                        <i class="fa fa-image"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            @if(!empty($item['text']))
                                                <div class="real-image-button">
                                                    <div class="button-text">{{ $item['text'] }}</div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    {{-- Khối 5: Lịch khai giảng & giữ chỗ thi --}}
    @if(isset($introduce['block_5_label']) || isset($introduce['block_5_title']))
        @php
            $scheduleLabel = $introduce['block_5_label'] ?? 'LỊCH KHAI GIẢNG & GIỮ CHỖ THI';
            $scheduleTitle = $introduce['block_5_title'] ?? '';
            $scheduleSubtitle = $introduce['block_5_subtitle'] ?? '';
            $scheduleTableTitle = $introduce['block_5_schedule_title'] ?? 'Lịch mở lớp tháng 11 - 01';
            $scheduleTable = $introduce['block_5_schedule_table'] ?? '';
            $timelineTitle = $introduce['block_5_timeline_title'] ?? 'Timeline giữ chỗ chứng chỉ';
            
            // Tạo mảng timeline items
            $timelineItems = [];
            for($i = 1; $i <= 4; $i++) {
                $text1 = $introduce['block_5_timeline_' . $i . '_text_1'] ?? '';
                $text2 = $introduce['block_5_timeline_' . $i . '_text_2'] ?? '';
                
                if(!empty($text1) || !empty($text2)) {
                    $timelineItems[] = [
                        'text1' => $text1,
                        'text2' => $text2,
                    ];
                }
            }
        @endphp
        <div class="intro-schedule page-setup">
            <div class="uk-container uk-container-center">
                <div class="schedule-header">
                    @if($scheduleLabel)
                        <div class="schedule-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">{{ $scheduleLabel }}</div>
                    @endif
                    <h2 class="schedule-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $scheduleTitle }}</h2>
                    @if($scheduleSubtitle)
                        <p class="schedule-subtitle wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">{{ $scheduleSubtitle }}</p>
                    @endif
                </div>
                
                <div class="uk-grid uk-grid-medium">
                    {{-- Left: Schedule Table --}}
                    <div class="uk-width-medium-1-2">
                        <div class="schedule-table-wrapper wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
                            @if($scheduleTableTitle)
                                <h3 class="schedule-table-title">{{ $scheduleTableTitle }}</h3>
                            @endif
                            @if($scheduleTable)
                                <div class="schedule-table-content">
                                    {!! $scheduleTable !!}
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    {{-- Right: Timeline --}}
                    <div class="uk-width-medium-1-2">
                        <div class="timeline-wrapper wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.4s">
                            @if($timelineTitle)
                                <h3 class="timeline-title">{{ $timelineTitle }}</h3>
                            @endif
                            @if(!empty($timelineItems))
                                <div class="timeline-items">
                                    @foreach($timelineItems as $key => $item)
                                        <div class="timeline-item wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ 0.5 + ($key * 0.1) }}s">
                                            @if($item['text1'])
                                                <div class="timeline-week">{{ $item['text1'] }}</div>
                                            @endif
                                            @if($item['text2'])
                                                <div class="timeline-description">{{ $item['text2'] }}</div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Khối 6 và 7: CTA và Form đăng ký (include từ file chung) --}}
    @include('frontend.component.intro-cta-register')

    {{-- Khối 8: Giảng viên --}}
    @if((isset($introduce['block_8_label']) || isset($introduce['block_8_title'])) && isset($lecturers) && $lecturers->isNotEmpty())
        @php
            $lecturerLabel = $introduce['block_8_label'] ?? 'ĐỘI NGŨ';
            $lecturerTitle = $introduce['block_8_title'] ?? '';
            $lecturerSubtitle = $introduce['block_8_subtitle'] ?? '';
        @endphp
        <div class="intro-lecturers page-setup">
            <div class="uk-container uk-container-center">
                <div class="lecturers-header">
                    @if($lecturerLabel)
                        <div class="lecturers-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">{{ $lecturerLabel }}</div>
                    @endif
                    <h2 class="lecturers-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">{{ $lecturerTitle }}</h2>
                    @if($lecturerSubtitle)
                        <p class="lecturers-subtitle wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">{{ $lecturerSubtitle }}</p>
                    @endif
                </div>
                
                <div class="lecturers-slider wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                    <div class="swiper-container lecturers-swiper">
                        <div class="swiper-wrapper">
                            @foreach($lecturers as $key => $lecturer)
                                @php
                                    // Lấy language data từ relationship
                                    $lecturerLanguage = $lecturer->languages->first();
                                    
                                    $lecturerName = $lecturerLanguage->pivot->name ?? '';
                                    $lecturerDescription = $lecturerLanguage->pivot->description ?? '';
                                    $lecturerContent = $lecturerLanguage->pivot->content ?? '';
                                    $lecturerImage = $lecturer->image ?? '';
                                    
                                    // Role là description
                                    $lecturerRole = $lecturerDescription ?? '';
                                @endphp
                                <div class="swiper-slide">
                                    <div class="lecturer-card wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="{{ 0.4 + ($key * 0.1) }}s">
                                        <div class="lecturer-avatar">
                                            @if($lecturerImage)
                                                <img src="{{ asset($lecturerImage) }}" alt="{{ $lecturerName }}">
                                            @else
                                                <div class="avatar-placeholder">{{ substr($lecturerName, 0, 2) }}</div>
                                            @endif
                                        </div>
                                        <div class="lecturer-name">{{ $lecturerName }}</div>
                                        <div class="lecturer-role">{{ $lecturerRole }}</div>
                                        <div class="lecturer-description">{!! $lecturerContent !!}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-prev lecturers-prev"></div>
                        <div class="swiper-button-next lecturers-next"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
<script>
    // Hiệu ứng số đếm từ 0 -> target
    document.addEventListener('DOMContentLoaded', function() {
        const animateCounter = (element) => {
            const originalText = element.textContent.trim();
            const target = parseInt(element.getAttribute('data-target')) || 0;
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60fps
            let current = 0;
            
            // Xác định format (+, %, .)
            const hasPlus = originalText.includes('+');
            const hasPercent = originalText.includes('%');
            const hasDot = originalText.includes('.');
            
            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    let displayValue = Math.floor(current);
                    // Format số với dấu chấm (ví dụ: 5.200)
                    if (hasDot && displayValue >= 1000) {
                        displayValue = displayValue.toLocaleString('vi-VN');
                    }
                    element.textContent = displayValue + (hasPlus ? '+' : '') + (hasPercent ? '%' : '');
                    requestAnimationFrame(updateCounter);
                } else {
                    // Giữ nguyên format ban đầu
                    element.textContent = originalText;
                }
            };
            
            updateCounter();
        };
        
        // Animate các số trong khối 1
        document.querySelectorAll('.intro-hero .stat-number').forEach(counter => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            observer.observe(counter);
        });
        
        // Animate các số trong khối 2
        document.querySelectorAll('.intro-mission .mission-stat-item .stat-number').forEach(counter => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            observer.observe(counter);
        });
        
        // Animate số trong overlay khối 3
        const overlayNumber = document.querySelector('.intro-roadmap .overlay-number');
        if (overlayNumber) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            observer.observe(overlayNumber);
        }
    });
</script>
@endpush
