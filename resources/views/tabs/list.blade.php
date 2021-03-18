    @if ($Objects['list_view']->count())
    {{$Objects['list_view']->links(("pagination::bootstrap-4")) }}

        <div class=" border-bottom form-group row  ml-1">
            <label class="col-sm col-form-label">##</label>
            @foreach ($Objects["form_view"] as $items)
                @foreach ($items->toArray() as $key=>$value)
                    @if ($key != "image" && $key != "discription" && in_array($key, $Objects['form']))
                        <label class="col-sm col-form-label">{{ucfirst($key)}}</label>
                    @endif
                @endforeach
            @endforeach
        
        </div>
        @foreach ($Objects['list_view'] as $x=>$items)

            @if ($Objects["title"] == "Inventory")
                <div class="border-bottom form-group row ml-1">
                    <p class="col-sm col-form-label">{{ ++$x }} )</p>
                    @foreach ($items->toArray() as $key=>$value)
                        @if (in_array($key, $Objects['form']) && $key != "image" && $key != "discription" )
                            <p class="col-sm col-form-label">{{strval($value)}}</p>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="border-bottom form-group row ml-1">
                    <p class="col-sm col-form-label">{{ ++$x }} )</p>
                        <p class="col-sm col-form-label">{{$items->name}}</p>
                        <p class="col-sm col-form-label">{{$items->contact}}</p>
                </div>
            @endif

        @endforeach
    @else
        <p>There are no {{$Objects['title']}}</p>
    @endif