    @if ($Objects['list_view']->count())
    {{$Objects['list_view']->links(("pagination::bootstrap-4")) }}
        <div class=" border-bottom form-group row  ml-1">
            <label class="col-sm col-form-label">##</label>
            @foreach ($Objects["form"] as $key=>$items)
                @if ($items != "image" && $items != "discription" )
                    <label class="col-sm col-form-label">{{$items}}</label>
                @endif
            @endforeach       
        </div>
        @foreach ($Objects['list_view'] as $x=>$items)
            @if ($Objects["title"] == "Inventory")
                <div class="border-bottom  ">
                    <div class="form-group row ml-1">
                        <p class="col-sm col-form-label">{{ ++$x }} )</p>
                        @foreach ($items->toArray() as $key=>$value)
                            @if (in_array($key, $Objects['form']) && $key != "image" && $key != "discription" )
                                <p class="col-sm col-form-label">{{strval($value)}}</p>
                            @endif
                        @endforeach
                    </div>
                </div> 
            @else
                <div class="border-bottom  ">
                    <div class="form-group row ml-1">
                        <p class="col-sm col-form-label">{{ ++$x }} )</p>
                        <p class="col-sm col-form-label">{{$items->name}}</p>
                        <p class="col-sm col-form-label">{{$items->contact}}</p>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <p>There are no {{$Objects['form'][0]}}</p>
    @endif