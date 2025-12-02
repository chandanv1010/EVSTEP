@extends('frontend.homepage.layout')
@section('content')

<div class="panel-lecturer-detail">
    {{-- Hero Section --}}
    <div class="lecturer-hero">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                <div class="uk-width-medium-1-3">
                    <div class="lecturer-hero-image wow fadeInLeft" data-wow-duration="0.8s">
                        @if(!empty($lecturer->image))
                            <img 
                                src="{{ $lecturer->image }}" 
                                alt="{{ $lecturer->name }}"
                            >
                        @else
                            <div class="lecturer-hero-placeholder">
                                <span class="hero-initials">{{ strtoupper(substr($lecturer->name, 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="uk-width-medium-2-3">
                    <div class="lecturer-hero-info wow fadeInRight" data-wow-duration="0.8s">
                        <div class="lecturer-label">GIẢNG VIÊN</div>
                        <h1 class="lecturer-name">{{ $lecturer->name }}</h1>
                        <p class="lecturer-position">{{ $lecturer->position }}</p>
                        
                        <div class="lecturer-meta">
                            @if(!empty($lecturer->birth_year))
                                <div class="meta-item">
                                    <i class="fa fa-calendar"></i>
                                    <span>Năm sinh: {{ $lecturer->birth_year }}</span>
                                </div>
                            @endif
                            
                            @if(!empty($lecturer->teaching_certificate))
                                <div class="meta-item">
                                    <i class="fa fa-certificate"></i>
                                    <span>Chứng chỉ sư phạm: {{ $lecturer->teaching_certificate }}</span>
                                </div>
                            @endif
                            
                            @if(isset($products) && $products->isNotEmpty())
                                <div class="meta-item">
                                    <i class="fa fa-book"></i>
                                    <span>{{ $products->count() }} khóa học</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="lecturer-content-section page-setup">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium">
                <div class="uk-width-medium-2-3">
                    {{-- Degree Section --}}
                    @if(!empty($lecturer->degree))
                        <div class="content-block wow fadeInUp" data-wow-duration="0.8s">
                            <div class="block-header">
                                <i class="fa fa-graduation-cap"></i>
                                <h2>Bằng Cấp</h2>
                            </div>
                            <div class="block-content">
                                {!! nl2br(e($lecturer->degree)) !!}
                            </div>
                        </div>
                    @endif

                    {{-- Experience Section --}}
                    @if(!empty($lecturer->experience))
                        <div class="content-block wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
                            <div class="block-header">
                                <i class="fa fa-briefcase"></i>
                                <h2>Kinh Nghiệm Giảng Dạy</h2>
                            </div>
                            <div class="block-content experience-content">
                                {!! $lecturer->experience !!}
                            </div>
                        </div>
                    @endif

                    {{-- Description Section --}}
                    @if(!empty($lecturer->description))
                        <div class="content-block wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                            <div class="block-header">
                                <i class="fa fa-info-circle"></i>
                                <h2>Giới Thiệu</h2>
                            </div>
                            <div class="block-content">
                                {!! $lecturer->description !!}
                            </div>
                        </div>
                    @endif
                </div>

                <div class="uk-width-medium-1-3">
                    {{-- Courses Section --}}
                    @if(isset($products) && $products->isNotEmpty())
                        <div class="sidebar-block wow fadeInUp" data-wow-duration="0.8s">
                            <div class="sidebar-header">
                                <i class="fa fa-book"></i>
                                <h3>Khóa Học Giảng Dạy</h3>
                            </div>
                            <div class="courses-list">
                                @foreach($products as $product)
                                    <a href="{{ write_url($product->canonical) }}" class="course-item">
                                        <div class="course-image">
                                            <img src="{{ $product->image ?? 'frontend/resources/img/default-course.png' }}" alt="{{ $product->name }}">
                                        </div>
                                        <div class="course-info">
                                            <h4>{{ $product->name }}</h4>
                                            @if(!empty($product->price))
                                                <p class="course-price">{{ number_format($product->price) }}đ</p>
                                            @endif
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Other Lecturers --}}
                    @if(isset($allLecturers) && $allLecturers->isNotEmpty())
                        <div class="sidebar-block wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s">
                            <div class="sidebar-header">
                                <i class="fa fa-users"></i>
                                <h3>Giảng Viên Khác</h3>
                            </div>
                            <div class="lecturers-list">
                                @foreach($allLecturers as $otherLecturer)
                                    @if($otherLecturer->id != $lecturer->id)
                                        <a href="{{ write_url('giao-vien/'.$otherLecturer->canonical) }}" class="lecturer-item">
                                            <div class="lecturer-avatar">
                                                <img src="{{ $otherLecturer->image ?? 'frontend/resources/img/default-avatar.png' }}" alt="{{ $otherLecturer->name }}">
                                            </div>
                                            <div class="lecturer-info-small">
                                                <h4>{{ $otherLecturer->name }}</h4>
                                                <p>{{ $otherLecturer->position }}</p>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Contact CTA --}}
                    <div class="sidebar-block cta-block wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <i class="fa fa-phone-alt"></i>
                        <h3>Liên Hệ Tư Vấn</h3>
                        <p>Để được tư vấn chi tiết về khóa học và lộ trình học tập</p>
                        <a href="#" class="btn-contact open-register-popup">Liên Hệ Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Lecturer Detail Styles */
.panel-lecturer-detail {
    background: #fff;
}

/* Hero Section */
.lecturer-hero {
    background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%);
    padding: 80px 0 60px;
}

.lecturer-hero-image {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.lecturer-hero-image img {
    width: 100%;
    height: auto;
    display: block;
}

.lecturer-hero-placeholder {
    width: 100%;
    aspect-ratio: 1/1;
    background: linear-gradient(135deg, #E85923 0%, #ff7043 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero-initials {
    font-size: 120px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

.lecturer-hero-info {
    padding: 20px 0;
}

.lecturer-label {
    font-size: 14px;
    font-weight: 700;
    color: #E85923;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 15px;
}

.lecturer-name {
    font-size: 48px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 15px;
    line-height: 1.2;
}

.lecturer-position {
    font-size: 20px;
    color: #E85923;
    font-weight: 600;
    margin-bottom: 30px;
}

.lecturer-meta {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 16px;
    color: #555;
    padding: 12px 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.meta-item i {
    color: #E85923;
    font-size: 18px;
    width: 24px;
    text-align: center;
}

/* Content Section */
.lecturer-content-section {
    padding: 60px 0;
}

.content-block {
    background: #fff;
    border-radius: 16px;
    padding: 35px;
    margin-bottom: 30px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.block-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f0f0f0;
}

.block-header i {
    font-size: 28px;
    color: #E85923;
}

.block-header h2 {
    font-size: 26px;
    font-weight: 700;
    color: #1a1a1a;
    margin: 0;
}

.block-content {
    font-size: 16px;
    line-height: 1.8;
    color: #444;
}

.experience-content ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.experience-content ul li {
    padding-left: 25px;
    margin-bottom: 12px;
    position: relative;
}

.experience-content ul li:before {
    content: "\f00c";
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    position: absolute;
    left: 0;
    color: #E85923;
}

/* Sidebar */
.sidebar-block {
    background: #fff;
    border-radius: 16px;
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
}

.sidebar-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 2px solid #f0f0f0;
}

.sidebar-header i {
    font-size: 22px;
    color: #E85923;
}

.sidebar-header h3 {
    font-size: 20px;
    font-weight: 700;
    color: #1a1a1a;
    margin: 0;
}

/* Courses List */
.courses-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.course-item {
    display: flex;
    gap: 15px;
    padding: 15px;
    border-radius: 12px;
    background: #f8f9fa;
    text-decoration: none;
    transition: all 0.3s ease;
}

.course-item:hover {
    background: #E85923;
    transform: translateX(5px);
}

.course-item:hover h4,
.course-item:hover .course-price {
    color: #fff;
}

.course-image {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    overflow: hidden;
    flex-shrink: 0;
}

.course-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.course-info h4 {
    font-size: 15px;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 8px;
    line-height: 1.4;
    transition: color 0.3s ease;
}

.course-price {
    font-size: 16px;
    font-weight: 700;
    color: #E85923;
    transition: color 0.3s ease;
}

/* Lecturers List */
.lecturers-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.lecturer-item {
    display: flex;
    gap: 15px;
    padding: 15px;
    border-radius: 12px;
    background: #f8f9fa;
    text-decoration: none;
    transition: all 0.3s ease;
}

.lecturer-item:hover {
    background: #E85923;
    transform: translateX(5px);
}

.lecturer-item:hover h4,
.lecturer-item:hover p {
    color: #fff;
}

.lecturer-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    overflow: hidden;
    flex-shrink: 0;
}

.lecturer-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.lecturer-info-small h4 {
    font-size: 16px;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 5px;
    transition: color 0.3s ease;
}

.lecturer-info-small p {
    font-size: 13px;
    color: #666;
    transition: color 0.3s ease;
}

/* CTA Block */
.cta-block {
    background: linear-gradient(135deg, #E85923 0%, #d94d1a 100%);
    text-align: center;
    color: #fff;
}

.cta-block i {
    font-size: 48px;
    margin-bottom: 20px;
    color: #fff;
}

.cta-block h3 {
    font-size: 22px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 15px;
}

.cta-block p {
    font-size: 15px;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 25px;
    line-height: 1.6;
}

.btn-contact {
    display: inline-block;
    padding: 14px 35px;
    background: #fff;
    color: #E85923;
    font-weight: 700;
    font-size: 16px;
    border-radius: 30px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-contact:hover {
    background: #1a1a1a;
    color: #fff;
    transform: scale(1.05);
}

/* Responsive */
@media (max-width: 959px) {
    .lecturer-name {
        font-size: 38px;
    }
    
    .lecturer-position {
        font-size: 18px;
    }
    
    .block-header h2 {
        font-size: 22px;
    }
    
    .uk-width-medium-1-3,
    .uk-width-medium-2-3 {
        width: 100% !important;
    }
}

@media (max-width: 767px) {
    .lecturer-hero {
        padding: 60px 0 40px;
    }
    
    .lecturer-hero-info {
        margin-top: 30px;
    }
    
    .lecturer-name {
        font-size: 32px;
    }
    
    .lecturer-position {
        font-size: 16px;
    }
    
    .hero-initials {
        font-size: 80px;
    }
    
    .lecturer-content-section {
        padding: 40px 0;
    }
    
    .content-block,
    .sidebar-block {
        padding: 25px 20px;
    }
    
    .block-header h2 {
        font-size: 20px;
    }
    
    .sidebar-header h3 {
        font-size: 18px;
    }
}
</style>

@endsection

