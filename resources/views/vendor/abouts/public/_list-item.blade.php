<li class="abouts-item">
    <a class="abouts-item-link" href="{{ route($lang.'::about', $about->slug) }}" title="{{ $about->title }}">
        <span class="abouts-item-title">{!! $about->title !!}</span>
        <span class="abouts-item-image">{!! $about->present()->thumb(null, 200) !!}</span>
    </a>
</li>
