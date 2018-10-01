<ul class="abouts-list">
    @foreach ($items as $about)
    @include('abouts::public._list-item')
    @endforeach
</ul>
