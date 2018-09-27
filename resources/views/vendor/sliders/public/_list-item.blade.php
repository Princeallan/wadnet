<li class="sliders-item">
    <a class="sliders-item-link" href="{{ route($lang.'::slider', $slider->slug) }}" title="{{ $slider->title }}">
        <span class="sliders-item-title">{!! $slider->title !!}</span>
        <span class="sliders-item-image">{!! $slider->present()->thumb(null, 200) !!}</span>
    </a>
</li>
