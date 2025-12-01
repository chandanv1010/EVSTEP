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
                {{-- Left: Promotional Content --}}
                <div class="uk-width-medium-1-2">
                    <div class="register-promo wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">
                        <h2 class="promo-title">THẦN TỐC CHINH PHỤC MỌI MỤC TIÊU TIẾNG ANH</h2>
                        <div class="promo-graphic">
                            <div class="vstep-logo-circle">
                                <span>VSTEP</span>
                            </div>
                            <div class="promo-banner">
                                <span>CAM KẾT ĐẦU RA</span>
                            </div>
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
@endif

