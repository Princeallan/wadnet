<ul class="subscriptions-list">
    @foreach ($items as $subscription)
    @include('subscriptions::public._list-item')
    @endforeach
</ul>
