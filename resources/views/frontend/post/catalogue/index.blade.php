@extends('frontend.homepage.layout')
@section('content')
    @php
        $catalogueName = $postCatalogue->languages->first()->pivot->name ?? $postCatalogue->name ?? '';
        $catalogueDescription = $postCatalogue->languages->first()->pivot->description ?? $postCatalogue->description ?? '';
    @endphp
    @include('frontend.component.breadcrumb-hero', [
        'model' => $postCatalogue,
        'breadcrumb' => $breadcrumb ?? [],
        'title' => $catalogueName,
        'subtitle' => !empty($catalogueDescription) ? \Illuminate\Support\Str::limit(clean_text($catalogueDescription), 140) : null,
    ])
    <div class="post-catalogue-page page-setup">
        <div class="uk-container uk-container-center">
            {{-- Posts Grid --}}
            @if($posts->isNotEmpty())
                <div class="posts-grid">
                    <div class="uk-grid uk-grid-medium">
                        @foreach($posts as $post)
                            @php
                                $postLanguage = $post->languages->first();
                                $postName = $postLanguage->pivot->name ?? '';
                                $postCanonical = write_url($postLanguage->pivot->canonical ?? '');
                                $postImage = $post->image ? thumb($post->image, 600, 400) : '';
                                $postDescription = $postLanguage->pivot->description ?? '';
                                $postContent = $postLanguage->pivot->content ?? '';
                                $postDate = $post->created_at ? \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') : '';
                            @endphp
                            <div class="uk-width-medium-1-3">
                                <article class="post-card">
                                    <a href="{{ $postCanonical }}" class="post-image">
                                        @if($postImage)
                                            <img src="{{ $postImage }}" alt="{{ $postName }}" class="lazy-image">
                                        @else
                                            <div class="image-placeholder">
                                                <i class="fa fa-image"></i>
                                            </div>
                                        @endif
                                    </a>
                                    <div class="post-content">
                                        @if($postDate)
                                            <div class="post-date">{{ $postDate }}</div>
                                        @endif
                                        <h2 class="post-title">
                                            <a href="{{ $postCanonical }}">{{ $postName }}</a>
                                        </h2>
                                        @if($postDescription)
                                            <div class="post-excerpt">
                                                {!! cutnchar(strip_tags($postDescription), 120) !!}
                                            </div>
                                        @endif
                                        <a href="{{ $postCanonical }}" class="post-read-more">Đọc thêm →</a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                {{-- Pagination --}}
                @if($posts->hasPages())
                    <div class="pagination-wrapper">
                        @include('frontend.component.pagination', ['model' => $posts])
                    </div>
                @endif
            @else
                <div class="no-posts">
                    <p>Chưa có bài viết nào trong danh mục này.</p>
                </div>
            @endif
        </div>
    </div>
@endsection

