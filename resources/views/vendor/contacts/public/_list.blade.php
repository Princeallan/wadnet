<ul class="contacts-list">
    @foreach ($items as $contact)
    @include('contacts::public._list-item')
    @endforeach
</ul>
