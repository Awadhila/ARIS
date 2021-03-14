<p class="col-sm-3 col-form-label">{{$Objects["title"]}}</p>
<div class="container">
    <div class="row">
        @if ($Objects["title"] == "Customer" || $Objects["title"] ==  "Supplier")
            <div class="col">
            @foreach ($Objects['form_view'] as $items)
                @foreach ($items->toArray() as $key=>$value)
                    @if ( ucfirst($key) == "Name" || ucfirst($key) == "Contact")
                        <div class="form-group row">
                            <label for="{{ucfirst($key)}}" class="col-sm-4 col-form-label">{{ucfirst($key)}}</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" name={{ucfirst($key)}} id={{ucfirst($key)}} value="{{$value}}">
                            </div>
                        </div>  
                    @endif
                @endforeach
            @endforeach
            </div>    
        @else
            @foreach ($Objects['form_view'] as $items)
  
                @foreach ($items->toArray() as $key=>$value)
                    @if (in_array($key, $Objects['form']))
                        @if ($key == "name"  || $key == "image" )
                            <div class="col">
                                @if (array_key_exists("Supp",$Objects) && $key == "name" )
                                <div style="display: none;" class="form-group row " id = "supp">
                                <label for="Supplier" class="col-sm-4 col-form-label">Supplier</label>
                                    <div class="col-sm-7">
                                    <select  class="form-control" name="Supplier"  id="Supplier" >
                                        @foreach ($Objects['Supp'] as $supp) 
                                        @if ($items->supplier_id == $supp->id)
                                            <option>{{$supp->name}}</option>
                                        @endif
                                        @endforeach
                                        @foreach ($Objects['Supp'] as $supp) 
                                        @if ($items->supplier_id != $supp->id)
                                            <option>{{$supp->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                @endif 
                        @endif
                        @if (in_array($key, $Objects['non_editable']))
                            <div class="form-group row non-editable ">
                        @else 
                            <div class="form-group row">
                        @endif
                        @if ($key == "discription")
                            <label for="Discription" class="col-sm-4 col-form-label">{{ucfirst($key)}}</label>
                            <textarea readonly class="form-control-plaintext" name="Discription" id="Discription" rows="3">{{$value}}</textarea>
                        @endif
                        @if ($key == "image" )
                            <img id="invImage"  src="{{asset('storage/Images/')}}/{{$items->image}}"alt="Inventory Image" style="width: 50%;" class="img-thumbnail rounded mx-auto d-block">
                            <div style="display: none;" id="PreviewImage" class="card" style="width: 90%;">
                                <div class="card-body">
                                    <label for="Image">Enter Image Inventory</label>
                                    <input name="Image" type="file" class="form-control-file" onchange="displayImg(this)">
                                </div>
                            </div>                                       
                        @endif
                        @if ($key != "image" && $key != "discription" )
                            <label for="{{ucfirst($key)}}" class="col-sm-4 col-form-label">{{  preg_replace('/(?<!\ )[A-Z]/', '$0', strval(ucfirst($key))) }}</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" name="{{ucfirst($key)}}" id="{{ucfirst($key)}}" value="{{$value}}">
                            </div>
                        @endif
                        </div>  
                        @if ($key == "priceSale"  || $key == "discription" )
                            @if ($key == "priceSale")
                                <div style="display: none;" class="form-group row" id = "origin_update">
                                    <label for="Origin" class="col-sm-4 col-form-label">Origin</label>
                                    <div class="col-sm-7">
                                        <select  class="form-control" name="Origin"  id="Origin" >
                                            @if ($items->trade_origin == "local")
                                                <option>Local</option>
                                                <option>Import</option>            
                                            @else
                                                <option>Import</option>
                                                <option>Local</option> 
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div style="display: none;"  class="form-group row" id = "catagory_update">
                                    <legend for = "Catagory" class="col-form-label col-sm-4">Catagory</legend>
                                    @if ($items->catagory == "fruit")
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Catagory" id="Catagory" value="fruit" checked>
                                                <label class="form-check-label" for="Catagory">Fruit</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Catagory" id="Catagory" value="vegetables">
                                                <label class="form-check-label" for="Catagory">Vegetables</label>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-sm-10">
                                            <div class="form-check" >
                                                <input class="form-check-input" type="radio" name="Catagory" id="Catagory" value="fruit">
                                                <label class="form-check-label" for="Catagory">Fruit</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="Catagory" id="Catagory" value="vegetables" checked>
                                                <label class="form-check-label" for="Catagory">Vegetables</label>
                                            </div>
                                        </div>
                                    @endif
                                </div>      
                            @endif
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        @endif
    </div> 
</div>


