@include('layouts.tabs')
<div class="tab-content" id="ex1-content">
    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"  aria-labelledby="ex1-tab-1">
        <div class="border-bottom  ">
            @if ($Objects['form_view']->count())
                @foreach ($Objects['form_view'] as $items)
                    @if ($items->Type == "sales" && $items->Status == 1)
                        @include('tabs.form',['Objects' => $Objects])
                    @endif
                @endforeach
            @else
                @include('tabs.display.controls',['Objects' => $Objects])
                <p>There are no {{$Objects['title']}}</p>
            @endif
        </div>
    </div>
    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
        <div class="border-bottom  ">
            @if ($Objects['form_view']->count())
                @foreach ($Objects['form_view'] as $items)
                    @if ($items->Type == "sales" && $items->Status == 0)
                        @include('tabs.form',['Objects' => $Objects])
                    @endif
                @endforeach
            @else
                @include('tabs.display.controls',['Objects' => $Objects])
                <p>There are no {{$Objects['title']}}</p>
            @endif
        </div>
    </div>
</div>