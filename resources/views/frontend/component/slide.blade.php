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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
