@php
    $title = $title ?? null;

    if (empty($title) && isset($model)) {
        try {
            $title = $model->languages->first()->pivot->name ?? $model->languages->name ?? null;
        } catch (\Throwable $e) {
            $title = null;
        }

        if (empty($title)) {
            $title = $model->name ?? '';
        }
    }

    $subtitle = $subtitle ?? null;
@endphp

<div class="breadcrumb-hero">
    <div class="uk-container uk-container-center">
        <h1 class="breadcrumb-hero__title">{{ $title }}</h1>

        @if(!empty($subtitle))
            <div class="breadcrumb-hero__subtitle">{{ $subtitle }}</div>
        @endif

        <div class="breadcrumb-hero__trail">
            <a href="/">{{ __('frontend.home') }}</a>
            <span class="sep">/</span>

            @if(!empty($breadcrumb))
                @foreach($breadcrumb as $val)
                    @php
                        $name = $val->languages->first()->pivot->name ?? $val->languages->name ?? ($val->name ?? '');
                        $canonical = write_url($val->languages->first()->pivot->canonical ?? ($val->languages->canonical ?? ''), true, true);
                    @endphp
                    <a href="{{ $canonical }}" title="{{ $name }}">{{ $name }}</a>
                    <span class="sep">/</span>
                @endforeach
            @endif

            <span class="current">{{ $title }}</span>
        </div>
    </div>
</div>
