<p class="col-sm-3 col-form-label">{{$Objects["title"]}}</p>
<div class="container">
    <div class="row">
            @if ($Objects["title"] != "Inventory")
                <div class="col">
            @endif
            @foreach ($items->toArray() as $key=>$value)

                @if ($Objects["title"] == "Inventory")
                    @if (in_array($key, $Objects['form']) || in_array($key, $Objects['non_editable']) )
                            @include('tabs.display.inv_form')
                    @endif

                @elseif ($Objects["title"] == "Transaction")

                    @if ($key != "created_at" && $key != "updated_at")
                        <div class="form-group row">
                            <label for="{{ucfirst($key)}}" class="col-sm col-form-label">{{ucfirst($key)}}</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" name={{ucfirst($key)}} id={{ucfirst($key)}} value="{{$value}}">
                            </div>
                        </div>  
                    @endif

                @else

                    @if ( ucfirst($key) == "Name" || ucfirst($key) == "Contact")
                        <div class="form-group row">
                            <label for="{{ucfirst($key)}}" class="col-sm col-form-label">{{ucfirst($key)}}</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" name={{ucfirst($key)}} id={{ucfirst($key)}} value="{{$value}}">
                            </div>
                        </div>  
                    @endif
                @endif
            @endforeach
            @if ($Objects["title"] != "Inventory")
                </div>
            @endif
    </div>
</div>