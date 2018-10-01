<ul class="magazines-list">
    @foreach ($items as $magazine)
    @include('magazines::public._list-item')
    @endforeach
</ul>
