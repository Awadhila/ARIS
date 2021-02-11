<div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"  aria-labelledby="ex1-tab-1">
@if (!empty($option))
<div class=" border-bottom form-group row  ml-1">
    <label class="col-sm-2 col-form-label">##</label>
    @foreach ($form as $key=>$items)
        @if ($key >= 1)
             <label class="col-sm-2 col-form-label">{{$items}}</label>
        @endif
    @endforeach

</div>
@foreach ($option as $key=>$items)
<div class="border-bottom  ">
    <div class="form-group row ml-1">
        <p class="col-sm-2 col-form-label">{{ ++$key }} )</p>
        @foreach ($items as $item)
                <p class="col-sm-2 col-form-label">
                    {{$item}}
                </p>
        @endforeach
    </div>
</div>
@endforeach

@else
    <p>There are no {{$form[0]}}</p>
@endif