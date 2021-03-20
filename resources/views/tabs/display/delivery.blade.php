
@include('layouts.tabs')
@include('tabs.display.controls',['Objects' => $Objects])

<div class="tab-content" id="ex1-content">
    <div class="tab-pane fade show active" id="ex1-tabs-3" role="tabpanel"  aria-labelledby="ex1-tab-3">
        <div class="border-bottom  ">
            @if ($Objects['form_view']->count())
                @if ($Objects['tab'] == "debit")
                    @foreach ($Objects['form_view'] as $items)
                        @include('tabs.form',['Objects' => $Objects])
                    @endforeach
                @endif
            @else
                @include('tabs.display.controls',['Objects' => $Objects])
                <p>There are no {{$Objects['title']}}</p>
            @endif
        </div>
    </div>
    <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
        <div class="border-bottom  ">
            @if ($Objects['form_view']->count())
                {{$Objects['tab']}}
                @if ($Objects['tab'] == "credit")
                    @foreach ($Objects['form_view'] as $items)
                        @include('tabs.form',['Objects' => $Objects])
                    @endforeach
                @endif
            @else
                @include('tabs.display.controls',['Objects' => $Objects])
                <p>There are no {{$Objects['title']}}</p>
            @endif
        </div>
    </div>
</div>