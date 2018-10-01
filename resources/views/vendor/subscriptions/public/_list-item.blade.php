<li class="subscriptions-item">
    <a class="subscriptions-item-link" href="{{ route($lang.'::subscription', $subscription->slug) }}" title="{{ $subscription->title }}">
        <span class="subscriptions-item-title">{!! $subscription->title !!}</span>
        <span class="subscriptions-item-image">{!! $subscription->present()->thumb(null, 200) !!}</span>
    </a>
</li>
