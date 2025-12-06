@php
    $slideKeyword = App\Enums\SlideEnum::MAIN;
    $slideMobile = \App\Models\Slide::where('publish', 2)->where('keyword', 'slide-mobile')->first();
    $slideMobileItems = [];
    if($slideMobile && $slideMobile->item) {
        $items = is_string($slideMobile->item) ? json_decode($slideMobile->item, true) : $slideMobile->item;
        if(isset($items['1']) && is_array($items['1'])) {
            $slideMobileItems = $items['1'];
        }
    }
@endphp

{{-- Slide Desktop --}}
@if(count($slides[$slideKeyword]['item']))
    <div class="panel-slide panel-slide-desktop page-setup">
        <div class="slide-nav">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($slides[$slideKeyword]['item'] as $key => $val )
                    <div class="swiper-slide">
                        <span class="image img-cover"><img src="{{ $val['image'] }}" class="img-ab img-1 wow fadeInDown"  data-wow-delay="0.8s" alt="Slide"></span>
                        {{-- Button đăng ký HTML --}}
                        <div class="slide-register-button">
                            <button type="button" class="btn-register-slide open-register-popup">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                </svg>
                                <span>Đăng Ký Ngay</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

{{-- Slide Mobile --}}
@if(count($slideMobileItems) > 0)
    <div class="panel-slide panel-slide-mobile page-setup">
        <div class="swiper-container swiper-mobile">
            <div class="swiper-wrapper">
                @foreach($slideMobileItems as $key => $val)
                    <div class="swiper-slide">
                        <span class="image img-cover"><img src="{{ $val['image'] }}" alt="Slide Mobile"></span>
                        {{-- Button đăng ký HTML mobile --}}
                        <div class="slide-register-button">
                            <button type="button" class="btn-register-slide open-register-popup">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                </svg>
                                <span>Đăng Ký Ngay</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
