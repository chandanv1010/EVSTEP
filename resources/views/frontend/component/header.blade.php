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
    <div class="header-middle">
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
    <div class="mobile-upper">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <div class="mobile-logo">
                    <a href="." title="{{ $system['seo_meta_title'] }}">
                        <img src="{{ $system['homepage_logo'] }}" alt="Mobile Logo">
                    </a>
                    <form action="{{ write_url('tim-kiem.html') }}" class="search" method="GET">
                        <input type="text" name="keyword" placeholder="Tìm kiếm">
                        <button type="submit" class="btn-search">
                            <img src="/frontend/resources/img/search.svg" alt="">
                        </button>
                    </form>
                </div>
                <div class="tool">
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
    <div class="navigation-mobile" data-uk-sticky>
        <ul class="uk-flex uk-flex-middle uk-list uk-clearfix uk-navbar-nav main-menu">
            <li>
                <a href="">
                    <svg width="25" height="20" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.1695 5.04384L4.16732 11.6345V18.7478C4.16732 18.932 4.24048 19.1086 4.37072 19.2389C4.50095 19.3691 4.67758 19.4423 4.86176 19.4423L9.72548 19.4297C9.90905 19.4288 10.0848 19.3552 10.2143 19.2251C10.3438 19.0949 10.4165 18.9188 10.4164 18.7352V14.5812C10.4164 14.397 10.4896 14.2204 10.6198 14.0901C10.7501 13.9599 10.9267 13.8867 11.1109 13.8867H13.8887C14.0728 13.8867 14.2495 13.9599 14.3797 14.0901C14.51 14.2204 14.5831 14.397 14.5831 14.5812V18.7322C14.5828 18.8236 14.6006 18.9141 14.6354 18.9986C14.6701 19.0831 14.7212 19.1599 14.7857 19.2247C14.8503 19.2894 14.9269 19.3407 15.0113 19.3758C15.0957 19.4108 15.1862 19.4288 15.2776 19.4288L20.1395 19.4423C20.3237 19.4423 20.5004 19.3691 20.6306 19.2389C20.7608 19.1086 20.834 18.932 20.834 18.7478V11.6298L12.8335 5.04384C12.7395 4.96802 12.6223 4.92668 12.5015 4.92668C12.3807 4.92668 12.2635 4.96802 12.1695 5.04384ZM24.8097 9.52344L21.1812 6.53255V0.520833C21.1812 0.3827 21.1263 0.250224 21.0287 0.152549C20.931 0.0548735 20.7985 0 20.6604 0H18.2298C18.0917 0 17.9592 0.0548735 17.8615 0.152549C17.7639 0.250224 17.709 0.3827 17.709 0.520833V3.67231L13.8231 0.47526C13.4502 0.168394 12.9823 0.000613431 12.4993 0.000613431C12.0164 0.000613431 11.5485 0.168394 11.1756 0.47526L0.189019 9.52344C0.136279 9.56703 0.0926449 9.62058 0.0606102 9.68104C0.0285755 9.7415 0.00876769 9.80768 0.00231864 9.8758C-0.0041304 9.94392 0.00290567 10.0126 0.0230248 10.078C0.043144 10.1434 0.0759519 10.2042 0.119574 10.2569L1.22634 11.6024C1.26985 11.6553 1.32336 11.6991 1.38381 11.7313C1.44426 11.7635 1.51047 11.7835 1.57864 11.79C1.64681 11.7966 1.71561 11.7897 1.7811 11.7696C1.84659 11.7496 1.90748 11.7168 1.96029 11.6732L12.1695 3.26432C12.2635 3.18851 12.3807 3.14717 12.5015 3.14717C12.6223 3.14717 12.7395 3.18851 12.8335 3.26432L23.0432 11.6732C23.0959 11.7168 23.1567 11.7496 23.2221 11.7697C23.2875 11.7898 23.3562 11.7969 23.4243 11.7904C23.4924 11.784 23.5586 11.7642 23.6191 11.7321C23.6795 11.7001 23.7331 11.6565 23.7767 11.6037L24.8835 10.2582C24.927 10.2052 24.9597 10.1441 24.9796 10.0784C24.9995 10.0128 25.0062 9.94379 24.9993 9.8755C24.9925 9.80722 24.9722 9.74096 24.9396 9.68054C24.9071 9.62012 24.8629 9.56673 24.8097 9.52344Z" fill="#FEE9B5"/>
                    </svg>
                </a>
            </li>
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
