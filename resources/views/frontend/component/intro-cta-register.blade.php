{{-- Khối 6: CTA Section --}}
@if(isset($introduce['block_6_title']) || isset($introduce['block_6_title_highlight']))
    @php
        $ctaTitle = $introduce['block_6_title'] ?? 'Sẵn sàng đạt chứng chỉ VSTEP chỉ sau';
        $ctaTitleHighlight = $introduce['block_6_title_highlight'] ?? '6-12 tuần?';
        $ctaSubtitle = $introduce['block_6_subtitle'] ?? 'Đăng ký ngay để nhận tư vấn miễn phí, test trình độ đầu vào và ưu đãi học phí lên tới 20% trong tháng 11.';
        $ctaButton1 = $introduce['block_6_button_1'] ?? 'Đăng ký tư vấn';
        $ctaButton1Link = $introduce['block_6_button_1_link'] ?? '#';
        $ctaButton2 = $introduce['block_6_button_2'] ?? 'Đặt mua khóa học';
        $ctaButton2Link = $introduce['block_6_button_2_link'] ?? '#';
    @endphp
    <div class="panel-vstep-cta page-setup">
        <div class="uk-container uk-container-center">
            <div class="cta-card wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                <h2 class="cta-title wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.3s">
                    <span class="cta-title-line1">{{ $ctaTitle }}</span>
                    <span class="cta-title-line2">{{ $ctaTitleHighlight }}</span>
                </h2>
                <p class="cta-subtitle wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s">{{ $ctaSubtitle }}</p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-consult open-register-popup wow fadeInLeft" data-wow-duration="0.6s" data-wow-delay="0.5s">{{ $ctaButton1 }}</a>
                    <a href="{{ $ctaButton2Link }}" class="btn btn-buy wow fadeInRight" data-wow-duration="0.6s" data-wow-delay="0.5s">{{ $ctaButton2 }}</a>
                </div>
            </div>
        </div>
    </div>
@endif

{{-- Khối 7: Form đăng ký --}}
@if(isset($introduce['block_7_title_line1']) || isset($introduce['block_7_title_line2']))
    @php
        $registerTitle1 = $introduce['block_7_title_line1'] ?? 'Ôn luyện VSTEP';
        $registerTitle2 = $introduce['block_7_title_line2'] ?? 'ngay hôm nay';
        $formTitle = $introduce['block_7_form_title'] ?? 'Đăng ký ngay';
        $formSubtitle = $introduce['block_7_form_subtitle'] ?? 'Tư vấn miễn phí';
    @endphp
    <div class="panel-vstep-register page-setup">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium" data-uk-grid-match>
                {{-- Left: Content --}}
                <div class="uk-width-medium-1-2">
                    <div class="register-content wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <div class="register-logo wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.3s">
                            @if(isset($system['homepage_logo']) && $system['homepage_logo'])
                                <img src="{{ $system['homepage_logo'] }}" alt="{{ $system['homepage_company'] ?? 'VSTEP' }}">
                            @else
                                <div class="logo-placeholder">VSTEP</div>
                            @endif
                        </div>
                        <h2 class="register-title wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s">
                            <span class="title-line1">{{ $registerTitle1 }}</span>
                            <span class="title-line2">{{ $registerTitle2 }}</span>
                        </h2>
                        <div class="register-features">
                            @php
                                $features = [
                                    ['icon' => 'fa-home', 'text' => 'Học Online Linh Hoạt'],
                                    ['icon' => 'fa-money', 'text' => 'Chi Phí Hợp Lý'],
                                    ['icon' => 'fa-clock-o', 'text' => 'Tiết Kiệm Thời Gian'],
                                    ['icon' => 'fa-star', 'text' => 'Giáo Viên Chuyên Gia']
                                ];
                            @endphp
                            @foreach($features as $key => $feature)
                                <div class="feature-item wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="{{ 0.5 + ($key * 0.1) }}s">
                                    <div class="feature-icon">
                                        <i class="fa {{ $feature['icon'] }}"></i>
                                    </div>
                                    <span class="feature-text">{{ $feature['text'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                {{-- Right: Form --}}
                <div class="uk-width-medium-1-2">
                    <div class="register-form-wrapper wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.3s">
                        <div class="register-book wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.6s">
                            <img src="{{ asset('frontend/resources/img/book.png') }}" alt="Book">
                        </div>
                        <form class="register-form wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.7s" id="vstep-register-form">
                            <h3 class="form-title">{{ $formTitle }}</h3>
                            <p class="form-subtitle">{{ $formSubtitle }}</p>
                            
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Họ và tên" required>
                            </div>
                            
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control" placeholder="Số điện thoại" required>
                            </div>
                            
                            <div class="form-group">
                                <select name="level" class="form-control" required>
                                    <option value="">Chọn trình độ</option>
                                    <option value="A1">A1 - Cơ bản</option>
                                    <option value="A2">A2 - Sơ cấp</option>
                                    <option value="B1">B1 - Trung cấp</option>
                                    <option value="B2">B2 - Trung cao cấp</option>
                                    <option value="C1">C1 - Cao cấp</option>
                                    <option value="C2">C2 - Thành thạo</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-submit">ĐĂNG KÝ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

