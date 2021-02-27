    @if ($Objects['list_view']->count())
    {{$Objects['list_view']->links(("pagination::bootstrap-4")) }}

        <div class=" border-bottom form-group row  ml-1">
            <label class="col-sm-2 col-form-label">##</label>
            @foreach ($Objects["form"] as $key=>$items)
                @if ($key >= 1 && $key <= 4)
                    <label class="col-sm-2 col-form-label">{{$items}}</label>
                @endif
            @endforeach
        
        </div>
        @foreach ($Objects['list_view'] as $key=>$items)
            @if ($Objects["form"][0] == "Inventory")
                <div class="border-bottom  ">
                    <div class="form-group row ml-1">
                        <p class="col-sm-2 col-form-label">{{ ++$key }} )</p>
                            <p class="col-sm-2 col-form-label">{{$items->name}}</p>
                            <p class="col-sm-2 col-form-label">{{$items->trade_origin}}</p>
                            <p class="col-sm-2 col-form-label">{{$items->Catagory}}</p>
                            <p class="col-sm-2 col-form-label">{{$items->price}}</p>
                    </div>
                </div>  
            @else
                <div class="border-bottom  ">
                    <div class="form-group row ml-1">
                        <p class="col-sm-2 col-form-label">{{ ++$key }} )</p>
                            <p class="col-sm-2 col-form-label">{{$items->name}}</p>
                            <p class="col-sm-2 col-form-label">{{$items->contact}}</p>
                    </div>
                </div>
            @endif

        @endforeach
    @else
        <p>There are no {{$Objects['form'][0]}}</p>
    @endif