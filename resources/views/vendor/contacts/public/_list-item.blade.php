<li class="contacts-item">
    <a class="contacts-item-link" href="{{ route($lang.'::contact', $contact->slug) }}" title="{{ $contact->title }}">
        <span class="contacts-item-title">{!! $contact->title !!}</span>
        <span class="contacts-item-image">{!! $contact->present()->thumb(null, 200) !!}</span>
    </a>
</li>
