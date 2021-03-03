@if ($Objects["shop_view"]->count())
<div class="row-sm">
    {{$Objects['shop_view']->links(("pagination::bootstrap-4")) }}
</div>
    <div id="grid" class="container">
        @foreach ($Objects["shop_view"] as $key=>$items)
            @if ($key == 0 || $key == 3 ||$key == 6 )
                <div class="row">
                    @include('tabs.display.items')
            @else
                @include('tabs.display.items')
                @if ($key == 2 || $key == 5 ||$key == 8)
                </div>
                @endif
            @endif
        @endforeach
    <div>
@else
    <p>There are no inventory</p>
@endif
