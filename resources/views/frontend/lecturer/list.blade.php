@extends('frontend.homepage.layout')
@section('content')

<div class="panel-lecturer-list page-setup">
    {{-- Header Section - Full Width, No Container --}}
    <div class="lecturer-list-header">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium uk-flex uk-flex-middle" data-uk-grid-match>
                <div class="uk-width-medium-2-3">
                    <div class="lecturer-header-content wow fadeInLeft" data-wow-duration="0.8s">
                        <h1 class="lecturer-title">
                            <span class="title-main">Đội ngũ giáo viên</span>
                            <span class="title-sub">tại VSTEP</span>
                        </h1>
                        <ul class="lecturer-intro-list">
                            <li>{{ $system['lecturer_intro_text_1'] ?? 'Là những giáo viên nhiều năm kinh nghiệm giảng dạy VSTEP, giỏi kiến thức và yêu nghề.' }}</li>
                            <li>{{ $system['lecturer_intro_text_2'] ?? 'Các cô đi dạy vì cái tâm và khát khao giúp học viên cải thiện tiếng Anh và đạt mục tiêu B1, B2 VSTEP.' }}</li>
                        </ul>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <div class="lecturer-header-image wow fadeInRight" data-wow-duration="0.8s">
                        <div class="lecturer-featured-image">
                            @if(!empty($system['lecturer_featured_image']))
                                <img src="{{ $system['lecturer_featured_image'] }}" alt="Giảng viên VSTEP EASY">
                            @else
                                <img src="{{ asset('frontend/resources/img/default-lecturer-featured.jpg') }}" alt="Giảng viên VSTEP EASY" onerror="this.onerror=null; this.parentNode.innerHTML='<div class=\'featured-placeholder\'><span>V</span></div>'">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-container uk-container-center">
        {{-- Features Section --}}
        <div class="lecturer-features-section wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
            <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                {{-- Feature 1 --}}
                <div class="uk-width-medium-1-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa fa-graduation-cap"></i>
                        </div>
                        <h3 class="feature-title">{{ $system['lecturer_feature_1_title'] ?? 'Kỹ năng chuyên môn tốt' }}</h3>
                        <p class="feature-content">{{ $system['lecturer_feature_1_content'] ?? 'Đội ngũ giảng dạy của VSTEP EASY đều có nhiều năm kinh nghiệm, là Thạc sĩ, giảng viên đại học và có điểm 8.0 IELTS hoặc C1 VSTEP trở lên, kỹ năng sư phạm tốt và tổ chức lớp học. Tất cả giáo viên đều được training kỹ càng trước khi giảng dạy, vậy nên bạn có thể yên tâm về chất lượng giảng dạy đồng đều 100%.' }}</p>
                    </div>
                </div>

                {{-- Feature 2 --}}
                <div class="uk-width-medium-1-3">
                    <div class="feature-card">
                        <div class="feature-icon icon-students">
                            <i class="fa fa-users"></i>
                        </div>
                        <h3 class="feature-title">{{ $system['lecturer_feature_2_title'] ?? 'Đặt học viên làm trung tâm' }}</h3>
                        <p class="feature-content">{{ $system['lecturer_feature_2_content'] ?? 'Với mục tiêu không để ai bị bỏ lại phía sau, cố vấn học thuật và giáo viên VSTEP EASY thường xuyên họp tiến độ, đánh giá năng lực của TỪNG HỌC VIÊN. Đảm bảo tất cả học viên đều nhận được feedback, được chỉ ra điểm yếu và được giúp đỡ tận tâm để khắc phục. Đội ngũ VSTEP EASY luôn sẵn sàng hỗ trợ học viên 24/7 chứ không chỉ trong giờ học.' }}</p>
                    </div>
                </div>

                {{-- Feature 3 --}}
                <div class="uk-width-medium-1-3">
                    <div class="feature-card">
                        <div class="feature-icon icon-quality">
                            <i class="fa fa-medal"></i>
                        </div>
                        <h3 class="feature-title">{{ $system['lecturer_feature_3_title'] ?? 'Lớp học 4-1 ưu tiên chất lượng' }}</h3>
                        <p class="feature-content">{{ $system['lecturer_feature_3_content'] ?? 'Tại VSTEP EASY, mỗi học viên sẽ được hỗ trợ bởi đội ngũ 4 giáo viên bao gồm 1 giáo viên chính, 1 giáo viên học thuật và 2 giám khảo chấm chữa để theo dõi tiến độ, đánh giá năng lực của TỪNG HỌC VIÊN. VSTEP EASY còn hỗ trợ chấm chữa Nói Viết 1-1 miễn phí ngoài giờ học chính. Tất cả các lớp tại VSTEP EASY đều giới hạn sĩ số để tập trung vào chất lượng chứ không chạy theo số lượng.' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Lecturers Grid --}}
        @if(!empty($allLecturers) && count($allLecturers) > 0)
            <div class="lecturers-grid">
                {{-- Grid Header --}}
                <div class="lecturers-grid-header wow fadeInUp" data-wow-duration="0.8s">
                    <h2 class="grid-title">{{ $system['lecturer_grid_title'] ?? 'Đội ngũ giáo viên' }}</h2>
                    <p class="grid-description">{{ $system['lecturer_grid_description'] ?? 'Điều kiện tiên quyết để gia nhập đội ngũ chuyên môn VSTEP EASY là có 8.0 IELTS hoặc C1 VSTEP trở lên, kỹ năng sư phạm tốt và tổ chức lớp học. Tất cả giáo viên đều được training kỹ càng trước khi giảng dạy, vậy nên bạn có thể yên tâm về chất lượng giảng dạy đồng đều 100% khi học tại trung tâm.' }}</p>
                </div>

                {{-- Grid Cards --}}
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

@endsection

