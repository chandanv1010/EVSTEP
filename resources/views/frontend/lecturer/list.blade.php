@extends('frontend.homepage.layout')
@section('content')

<div class="panel-lecturer-list page-setup">
    <div class="uk-container uk-container-center">
        {{-- Header Section --}}
        <div class="lecturer-list-header">
            <div class="lecturer-label wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.1s">ĐỘI NGŨ</div>
            <h1 class="lecturer-title wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Giảng Viên</h1>
            <p class="lecturer-subtitle wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s">
                Đội ngũ giảng viên giàu kinh nghiệm, tận tâm và nhiệt huyết
            </p>
        </div>

        {{-- Lecturers Grid --}}
        @if(!empty($allLecturers) && count($allLecturers) > 0)
            <div class="lecturers-grid">
                <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid-match>
                    @foreach($allLecturers as $index => $lecturer)
                        <div class="uk-width-large-1-4 uk-width-medium-1-3 uk-width-small-1-2">
                            <div class="lecturer-card wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="{{ 0.1 * ($index % 3) }}s">
                                <a href="{{ write_url('giao-vien/'.$lecturer['canonical']) }}" class="lecturer-card-link">
                                    {{-- Image Section --}}
                                    <div class="lecturer-image-wrapper">
                                        @if(!empty($lecturer['image']))
                                            <img 
                                                src="{{ $lecturer['image'] }}" 
                                                alt="{{ $lecturer['name'] }}" 
                                                class="lecturer-image"
                                            >
                                        @else
                                            <div class="lecturer-image-placeholder">
                                                <span class="lecturer-initials">{{ strtoupper(substr($lecturer['name'], 0, 1)) }}</span>
                                            </div>
                                        @endif
                                        @if(isset($lecturer['courses']) && $lecturer['courses'] > 0)
                                            <div class="lecturer-badge">
                                                <i class="fa fa-book"></i>
                                                <span>{{ $lecturer['courses'] }} khóa học</span>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    {{-- Info Section --}}
                                    <div class="lecturer-info">
                                        <h3 class="lecturer-name">{{ $lecturer['name'] }}</h3>
                                        <p class="lecturer-position">{{ $lecturer['position'] }}</p>
                                        
                                        @if(!empty($lecturer['birth_year']))
                                            <div class="lecturer-detail">
                                                <i class="fa fa-calendar"></i>
                                                <span>Năm sinh: {{ $lecturer['birth_year'] }}</span>
                                            </div>
                                        @endif
                                        
                                        @if(!empty($lecturer['teaching_certificate']))
                                            <div class="lecturer-detail">
                                                <i class="fa fa-certificate"></i>
                                                <span>{{ $lecturer['teaching_certificate'] }}</span>
                                            </div>
                                        @endif
                                        
                                        @if(!empty($lecturer['degree']))
                                            <div class="lecturer-degree">
                                                <i class="fa fa-graduation-cap"></i>
                                                <span>{{ Str::limit($lecturer['degree'], 80) }}</span>
                                            </div>
                                        @endif
                                        
                                        <div class="lecturer-view-more">
                                            <span>Xem chi tiết</span>
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="lecturer-empty">
                <i class="fa fa-users"></i>
                <p>Chưa có giảng viên nào được đăng tải</p>
            </div>
        @endif
    </div>
</div>

<style>
/* Lecturer List Styles */
.panel-lecturer-list {
    padding: 80px 0;
    background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%);
}

.lecturer-list-header {
    text-align: center;
    margin-bottom: 60px;
}

.lecturer-label {
    font-size: 14px;
    font-weight: 700;
    color: #E85923;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 15px;
}

.lecturer-title {
    font-size: 42px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 20px;
    line-height: 1.2;
}

.lecturer-subtitle {
    font-size: 18px;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
}

/* Lecturer Card */
.lecturer-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
    margin-bottom: 40px;
}

.lecturer-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 40px rgba(232, 89, 35, 0.2);
}

.lecturer-card-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.lecturer-image-wrapper {
    position: relative;
    overflow: hidden;
    height: 320px;
    background: #f5f5f5;
}

.lecturer-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.lecturer-card:hover .lecturer-image {
    transform: scale(1.1);
}

.lecturer-image-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #E85923 0%, #ff7043 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.5s ease;
}

.lecturer-card:hover .lecturer-image-placeholder {
    transform: scale(1.05);
}

.lecturer-initials {
    font-size: 80px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.lecturer-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(232, 89, 35, 0.95);
    color: #fff;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
}

.lecturer-info {
    padding: 25px;
}

.lecturer-name {
    font-size: 22px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 8px;
    line-height: 1.3;
}

.lecturer-position {
    font-size: 15px;
    color: #E85923;
    font-weight: 600;
    margin-bottom: 15px;
}

.lecturer-detail,
.lecturer-degree {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 10px;
    font-size: 14px;
    color: #555;
    line-height: 1.6;
}

.lecturer-detail i,
.lecturer-degree i {
    color: #E85923;
    margin-top: 3px;
    flex-shrink: 0;
}

.lecturer-view-more {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #E85923;
    font-weight: 600;
    font-size: 14px;
    margin-top: 20px;
    transition: gap 0.3s ease;
}

.lecturer-card:hover .lecturer-view-more {
    gap: 12px;
}

.lecturer-empty {
    text-align: center;
    padding: 80px 20px;
    color: #999;
}

.lecturer-empty i {
    font-size: 64px;
    margin-bottom: 20px;
    color: #ddd;
}

.lecturer-empty p {
    font-size: 18px;
    color: #999;
}

/* Responsive */
@media (max-width: 1199px) {
    .uk-width-large-1-4 {
        width: 33.333% !important;
    }
}

@media (max-width: 959px) {
    .lecturer-title {
        font-size: 36px;
    }
    
    .lecturer-image-wrapper {
        height: 280px;
    }
    
    .lecturer-initials {
        font-size: 70px;
    }
    
    .uk-width-large-1-4,
    .uk-width-medium-1-3 {
        width: 50% !important;
    }
}

@media (max-width: 767px) {
    .panel-lecturer-list {
        padding: 60px 0;
    }
    
    .lecturer-list-header {
        margin-bottom: 40px;
    }
    
    .lecturer-title {
        font-size: 32px;
    }
    
    .lecturer-subtitle {
        font-size: 16px;
    }
    
    .lecturer-image-wrapper {
        height: 250px;
    }
    
    .lecturer-initials {
        font-size: 60px;
    }
    
    .uk-width-large-1-4,
    .uk-width-medium-1-3,
    .uk-width-small-1-2 {
        width: 100% !important;
    }
}
</style>

@endsection

