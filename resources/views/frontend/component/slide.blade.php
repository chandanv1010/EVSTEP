@php
    $slideKeyword = App\Enums\SlideEnum::MAIN;
@endphp
@if(count($slides[$slideKeyword]['item']))
    <div class="panel-slide page-setup">
        <div class="slide-nav">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                {{-- @dd($slides) --}}
                @foreach($slides[$slideKeyword]['item'] as $key => $val )
                    <div class="swiper-slide">
                        <span class="image img-cover"><img src="{{ $val['image'] }}" class="img-ab img-1 wow fadeInDown"  data-wow-delay="0.8s" alt="Slide"></span>
                        <div class="button-group">
                            <a href="{{ $val['canonical'] }}" class="btn btn-view">Xem khóa học</a>
                            <a href="#" class="btn btn-register open-register-popup">Đăng ký tư vấn</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
