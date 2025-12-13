<div id="header" class="pc-header uk-visible-large">
    {{-- Header Top - Orange Background --}}
    <div class="header-top">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                {{-- Left: Contact Information --}}
                <div class="header-top-left">
                    @if(isset($system['contact_hotline']) && !empty($system['contact_hotline']))
                        <div class="top-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-1.015-.063l-1.517 1.517a.678.678 0 0 1-.707.188l-3.25-1a.678.678 0 0 1-.188-1.106l1.517-1.517a.678.678 0 0 0-.063-1.015l-2.307-1.794z"/>
                            </svg>
                            <span>{{ $system['contact_hotline'] }}</span>
                        </div>
                    @endif
                    @if(isset($system['contact_email']) && !empty($system['contact_email']))
                        <div class="top-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                            </svg>
                            <span>{{ $system['contact_email'] }}</span>
                        </div>
                    @endif
                    @if(isset($system['contact_office']) && !empty($system['contact_office']))
                        <div class="top-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                            </svg>
                            <span>{{ $system['contact_office'] }}</span>
                        </div>
                    @endif
                </div>
                {{-- Right: Social Media --}}
                <div class="header-top-right">
                    @if(isset($system['social_facebook']) && !empty($system['social_facebook']))
                        <a href="{{ $system['social_facebook'] }}" target="_blank" rel="noopener noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                            </svg>
                        </a>
                    @endif
                    @if(isset($system['social_youtube']) && !empty($system['social_youtube']))
                        <a href="{{ $system['social_youtube'] }}" target="_blank" rel="noopener noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Header Middle - White Background --}}
    <div class="header-middle" data-uk-sticky="animation: uk-animation-slide-top">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                {{-- Logo --}}
                <div class="header-logo">
                    <a href="{{ config('app.url') }}" title="{{ $system['homepage_company'] ?? 'Home' }}">
                        @if(isset($system['homepage_logo']) && !empty($system['homepage_logo']))
                            <img src="{{ asset($system['homepage_logo']) }}" alt="{{ $system['homepage_company'] ?? 'Logo' }}">
                        @else
                            <div class="logo-placeholder">
                                <div class="logo-icon">V</div>
                                <span class="logo-text">VSTEP</span>
                            </div>
                        @endif
                    </a>
                </div>

                <div class="uk-flex uk-flex-middle">
                    {{-- Navigation Menu --}}
                    <div class="header-navigation">
                        @include('frontend.component.navigation')
                    </div>

                    {{-- Search and Register --}}
                    <div class="header-actions">
                        {{-- Search Bar --}}
                        <div class="header-search">
                            <form action="{{ write_url('tim-kiem') }}" method="GET">
                                <input type="text" name="keyword" placeholder="Tìm kiếm">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        {{-- Cart Icon --}}
                        <div class="header-cart">
                            <a href="{{ write_url('gio-hang') }}" class="cart-btn" title="Giỏ hàng">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 576 512">
                                    <path d="M0 24C0 10.7 10.7 0 24 0h45.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5l-51.6-271c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24m128 440a48 48 0 1 1 96 0 48 48 0 1 1-96 0m336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96"/>
                                </svg>
                                @if(isset($cartShare) && isset($cartShare['cartTotalItems']) && $cartShare['cartTotalItems'] > 0)
                                    <span class="cart-count">{{ $cartShare['cartTotalItems'] }}</span>
                                @endif
                            </a>
                        </div>

                        {{-- Register Button --}}
                        <div class="header-register">
                            <button type="button" class="register-btn" id="header-register-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                </svg>
                                <span>Đăng Ký</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Registration Popup Modal --}}
<div id="register-popup" class="register-popup-modal" style="display: none;">
    <div class="register-popup-overlay"></div>
    <div class="register-popup-content">
        <div class="register-popup-header">
            <h3>Đăng ký tư vấn lộ trình</h3>
            <button type="button" class="register-popup-close" id="close-register-popup">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
            </button>
        </div>
        <div class="register-popup-body">
            <form action="" method="POST" class="register-form" id="header-register-form">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="popup_name">Họ tên</label>
                    <input type="text" name="name" value="" class="form-input" id="popup_name" placeholder="Nhập vào họ tên của bạn *" required="">
                </div>
                <div class="form-group">
                    <label class="form-label" for="popup_phone">Số điện thoại</label>
                    <input type="text" name="phone" value="" class="form-input" id="popup_phone" placeholder="Nhập vào số điện thoại của bạn *" required="">
                </div>
                <div class="form-group">
                    <label class="form-label" for="popup_email">Email</label>
                    <input type="email" name="email" value="" class="form-input" id="popup_email" placeholder="Nhập vào email của bạn *" required="">
                </div>
                <div class="form-group">
                    <label class="form-label" for="popup_course_id">Khóa học đăng ký</label>
                    <select name="product_id" class="form-input form-select" id="popup_course_id" required="">
                        <option value="">Chọn khóa học *</option>
                        @if(isset($headerCourses) && $headerCourses->isNotEmpty())
                            @foreach($headerCourses as $course)
                                @php
                                    $courseLanguage = $course->languages->first();
                                    $courseName = $courseLanguage->pivot->name ?? '';
                                @endphp
                                <option value="{{ $course->id }}">{{ $courseName }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                
                <button type="submit" class="register-btn">
                    Đăng ký ngay
                </button>
            </form>
        </div>
    </div>
</div>

<div class="mobile-header uk-hidden-large">
    <div class="mobile-upper" data-uk-sticky>
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <div class="mobile-logo">
                    <a href="." title="{{ $system['seo_meta_title'] }}">
                        <img src="{{ $system['homepage_logo'] }}" alt="Mobile Logo">
                    </a>
                    <form action="{{ write_url('tim-kiem') }}" class="search" method="GET">
                        <input type="text" name="keyword" placeholder="Tìm kiếm">
                        <button type="submit" class="btn-search">
                            <img src="/frontend/resources/img/search.svg" alt="">
                        </button>
                    </form>
                </div>
                <div class="tool">
                    <div class="mobile-contacts">
                        @if(isset($system['contact_hotline']) && !empty($system['contact_hotline']))
                        <a href="tel:{{ $system['contact_hotline'] }}" class="mobile-contact-item mobile-hotline" title="Hotline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                            <span>{{ $system['contact_hotline'] }}</span>
                        </a>
                        @endif
                        @if(isset($system['contact_email']) && !empty($system['contact_email']))
                        <a href="mailto:{{ $system['contact_email'] }}" class="mobile-contact-item mobile-email" title="Email">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 512 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                            <span>{{ $system['contact_email'] }}</span>
                        </a>
                        @endif
                    </div>
                    <div class="cart-link">
                        <a href="{{ write_url('gio-hang') }}" title="" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 576 512" class="w-5 h-5 cursor-pointer fill-bottom-nav-mb  box-content"><path d="M0 24C0 10.7 10.7 0 24 0h45.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5l-51.6-271c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24m128 440a48 48 0 1 1 96 0 48 48 0 1 1-96 0m336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96"></path></svg>
                        </a>
                    </div>
                    <div class="menu-link">
                        <a href="#mobileCanvas" class="mobile-menu-button" data-uk-offcanvas="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 448 512" class="w-6 h-6 cursor-pointer  pl-3 box-content"><path d="M0 88c0-13.3 10.7-24 24-24h400c13.3 0 24 10.7 24 24s-10.7 24-24 24H24c-13.3 0-24-10.7-24-24m0 160c0-13.3 10.7-24 24-24h400c13.3 0 24 10.7 24 24s-10.7 24-24 24H24c-13.3 0-24-10.7-24-24m448 160c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24s10.7-24 24-24h400c13.3 0 24 10.7 24 24"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation-mobile" >
        <div class="mobile-nav-wrapper">
            <ul class="uk-flex uk-flex-middle uk-list uk-clearfix uk-navbar-nav main-menu">
                @if(isset($menu['mobile-menu']))
                    @foreach($menu['mobile-menu'] as $key => $val)
                        @php
                            $name = $val['item']->languages->first()->pivot->name;
                            $canonical = ($name == 'Trang chủ') ?  '' : write_url($val['item']->languages->first()->pivot->canonical, true, true);
                        @endphp
                        <li>
                            <a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
            <button type="button" class="mobile-register-btn open-register-popup">
                <i class="fa fa-user-plus"></i>
                <span>Đăng ký</span>
            </button>
        </div>
    </div>
</div>
<div id="mobileCanvas" class="uk-offcanvas offcanvas" >
    <div class="uk-offcanvas-bar" >
        @if(isset($menu['mobile']))
		<ul class="l1 uk-nav uk-nav-offcanvas uk-nav uk-nav-parent-icon" data-uk-nav>
			@foreach ($menu['mobile'] as $key => $val)
                @php
                    $name = $val['item']->languages->first()->pivot->name;
                    $canonical = write_url($val['item']->languages->first()->pivot->canonical, true, true);
                @endphp
                <li class="l1 {{ (count($val['children']))?'uk-parent uk-position-relative':'' }}">
                    <?php echo (isset($val['children']) && is_array($val['children']) && count($val['children']))?'<a href="#" title="" class="dropicon"></a>':''; ?>
                    <a href="{{ $canonical }}" title="{{ $name }}" class="l1">{{ $name }}</a>
                    @if(count($val['children']))
                    <ul class="l2 uk-nav-sub">
                        @foreach ($val['children'] as $keyItem => $valItem)
                        @php
                            $name_2 = $valItem['item']->languages->first()->pivot->name;
                            $canonical_2 = write_url($valItem['item']->languages->first()->pivot->canonical, true, true);
                        @endphp
                        <li class="l2">
                            <a href="{{ $canonical_2 }}" title="{{ $name_2 }}" class="l2">{{ $name_2 }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
			@endforeach
            @if(!is_null($customerAuth))
                <li>
                    <a href="{{ route('buyer.profile') }}" title="">Xin chào : {{ $customerAuth->name }}</a>
                </li>
            @else
                <li>
                    <a href="#modal-login" title="" data-uk-modal>Đăng nhập</a>
                </li>
            @endif
		</ul>
		@endif
	</div>
</div>
