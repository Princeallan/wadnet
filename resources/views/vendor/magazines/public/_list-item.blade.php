<li class="magazines-item">
    <a class="magazines-item-link" href="{{ route($lang.'::magazine', $magazine->slug) }}" title="{{ $magazine->title }}">
        <span class="magazines-item-title">{!! $magazine->title !!}</span>
        <span class="magazines-item-image">{!! $magazine->present()->thumb(null, 200) !!}</span>
    </a>
</li>
