@extends('frontend.homepage.layout')
@section('content')
@php
    $breadcrumbImage = !empty($postCatalogue->album) ? json_decode($postCatalogue->album, true)[0] : asset('userfiles/image/system/breadcrumb.png');
@endphp
@include('frontend.component.breadcrumb-hero', [
    'model' => $post,
    'breadcrumb' => $breadcrumb,
    'title' => $post->languages->first()->pivot->name ?? ($post->name ?? ''),
])
<div class="post-detail">
    <div class="product-catalogue-wrapper post-container">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium">
                {{-- Left Column: 2/3 --}}
                <div class="uk-width-large-2-3">
                    <div class="wrapper">
                        <div class="panel-head">
                            <h1 class="page-heading">{{ $post->languages->first()->pivot->name }}</h1>
                            <div class="time">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.80657 0.55838C10.9552 0.55838 13.0159 1.41193 14.5352 2.93125C16.0545 4.45058 16.9081 6.51122 16.9081 8.65987C16.9081 10.8085 16.0545 12.8692 14.5352 14.3885C13.0159 15.9078 10.9552 16.7614 8.80657 16.7614C6.65792 16.7614 4.59727 15.9078 3.07795 14.3885C1.55863 12.8692 0.705078 10.8085 0.705078 8.65987C0.705078 6.51122 1.55863 4.45058 3.07795 2.93125C4.59727 1.41193 6.65792 0.55838 8.80657 0.55838ZM8.80657 1.41117C6.88409 1.41117 5.04036 2.17487 3.68096 3.53427C2.32157 4.89366 1.55787 6.7374 1.55787 8.65987C1.55787 10.5823 2.32157 12.4261 3.68096 13.7855C5.04036 15.1449 6.88409 15.9086 8.80657 15.9086C9.75848 15.9086 10.7011 15.7211 11.5805 15.3568C12.46 14.9925 13.2591 14.4586 13.9322 13.7855C14.6053 13.1124 15.1392 12.3133 15.5035 11.4338C15.8678 10.5544 16.0553 9.61178 16.0553 8.65987C16.0553 6.7374 15.2916 4.89366 13.9322 3.53427C12.5728 2.17487 10.729 1.41117 8.80657 1.41117ZM8.38018 3.96953H9.23296V8.59165L13.2411 10.9027L12.8147 11.6446L8.38018 9.08627V3.96953Z" fill="#FFA629"/>
                                </svg>
                                {{ $post->created_at ? \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') : '' }}
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="uk-container uk-container-center" style="padding-top:20px;padding-bottom:30px;">
                                <div class="post-detail-container">
                                    <div class="post-content {{ $post->status_menu == 2 ? 'full' : '' }}">
                                        <div class="content">
                                            <x-table-of-contents :content="$contentWithToc" />
                                            {!! $contentWithToc !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Right Column: 1/3 --}}
                <div class="uk-width-large-1-3">
                    <div class="post-aside sticky-sidebar">
                        {{-- Latest Posts List --}}
                        @if(isset($latestPosts) && $latestPosts->isNotEmpty())
                        <div class="aside-latest-posts aside-panel">
                            <div class="aside-heading">Bài viết mới nhất</div>
                            <div class="aside-body">
                                @foreach($latestPosts as $latestPost)
                                    @php
                                        $postLanguage = $latestPost->languages->first();
                                        $postName = $postLanguage->pivot->name ?? '';
                                        $postCanonical = write_url($postLanguage->pivot->canonical ?? '');
                                        $postImage = $latestPost->image ? thumb($latestPost->image, 100, 100) : '';
                                        $postDate = $latestPost->created_at ? \Carbon\Carbon::parse($latestPost->created_at)->format('d/m/Y') : '';
                                    @endphp
                                    <div class="latest-post-item">
                                        <a href="{{ $postCanonical }}" class="latest-post-link">
                                            @if($postImage)
                                                <div class="latest-post-image">
                                                    <img src="{{ $postImage }}" alt="{{ $postName }}" class="lazy-image">
                                                </div>
                                            @else
                                                <div class="latest-post-image">
                                                    <div class="image-placeholder">
                                                        <i class="fa fa-image"></i>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="latest-post-content">
                                                <div class="latest-post-date">{{ $postDate }}</div>
                                                <h3 class="latest-post-title">{{ $postName }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        {{-- Registration Form --}}
                        <div class="aside-form panel-contact aside-panel">
                            <div class="aside-heading">Đăng ký tư vấn lộ trình</div>
                            <div class="aside-body">
                                <form action="" method="POST" class="register-form" id="post-register-form">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="name">Họ tên</label>
                                        <input type="text" name="name" value="" class="form-input" id="reg_name" placeholder="Nhập vào họ tên của bạn *" required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="phone">Số điện thoại</label>
                                        <input type="text" name="phone" value="" class="form-input" id="reg_phone" placeholder="Nhập vào số điện thoại của bạn *" required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" value="" class="form-input" id="reg_email" placeholder="Nhập vào email của bạn *" required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="course_id">Khóa học đăng ký</label>
                                        <select name="product_id" class="form-input form-select" id="reg_course_id" required="">
                                            <option value="">Chọn khóa học *</option>
                                            @if(isset($courses) && $courses->isNotEmpty())
                                                @foreach($courses as $course)
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
                        
                        @if(isset($widgets['product-catalogue']) && count($widgets['product-catalogue']->object))
                        <div class="aside-product-category aside-panel">
                            <div class="aside-heading">Danh mục khóa học</div>
                            <div class="aside-body">
                                @foreach($widgets['product-catalogue']->object as $key => $val)
                                @php
                                    $image = $val->image;
                                    $name = $val->languages->name;
                                    $canonical = write_url($val->languages->canonical);
                                    $description = $val->languages->description;
                                @endphp
                                <div class="category-item uk-flex uk-flex-middle">
                                    <span class="icon"><img src="{{ $image }}" alt="{{ $name }}"></span>
                                    <a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
