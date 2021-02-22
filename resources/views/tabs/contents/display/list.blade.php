    @if ($Objects[$Objects["form"][0]]->count())
        <div class=" border-bottom form-group row  ml-1">
            <label class="col-sm-2 col-form-label">##</label>
            @foreach ($Objects["form"] as $key=>$items)
                @if ($key >= 1)
                    <label class="col-sm-2 col-form-label">{{$items}}</label>
                @endif
            @endforeach
        
        </div>
        @foreach ($Objects[$Objects["form"][0]] as $key=>$items)
            <div class="border-bottom  ">
                <div class="form-group row ml-1">
                    <p class="col-sm-2 col-form-label">{{ ++$key }} )</p>
                        <p class="col-sm-2 col-form-label">{{$items->name}}</p>
                        <p class="col-sm-2 col-form-label">{{$items->contact}}</p>
                </div>
            </div>
        @endforeach
    @else
        <p>There are no {{$Objects['form'][0]}}</p>
    @endif