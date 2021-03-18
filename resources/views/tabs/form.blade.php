<p class="col-sm-3 col-form-label">{{$Objects["title"]}}</p>
<div class="container">
    <div class="row">
        @foreach ($Objects['form_view'] as $items)
            <div class="col">
                @foreach ($items->toArray() as $key=>$value)

                    @if ($Objects["title"] != "Inventory")
                            @if ( ucfirst($key) == "Name" || ucfirst($key) == "Contact")
                                <div class="form-group row">
                                    <label for="{{ucfirst($key)}}" class="col-sm col-form-label">{{ucfirst($key)}}</label>
                                    <div class="col-sm-7">
                                        <input type="text" readonly class="form-control-plaintext" name={{ucfirst($key)}} id={{ucfirst($key)}} value="{{$value}}">
                                    </div>
                                </div>  
                            @endif
                    @else
                        @if (in_array($key, $Objects['form']) || in_array($key, $Objects['non_editable']))
                            @if ($key == "supplier" || $key == "origin" || $key == "catagory" || $key == "discription" || $key == "image" )
                                @if ($key == "discription" || $key == "image" )
                                    @if ($key == "image" )
                                        </div>
                                        <div class="col">                                          
                                    @else
                                        <label for={{ucfirst($key)}} class="col-sm col-form-label">{{ucfirst($key)}}</label>
                                    @endif
                                    <div class="form-group row editable">
                                @else
                                    <div style="display: none;" class="form-group row editable">
                                        <label for={{ucfirst($key)}} class="col-sm col-form-label">{{ucfirst($key)}}</label>
                                @endif

                                @if ($key == "supplier")
                                    <div class="col-sm-8">
                                        <select  class="form-control" name={{ucfirst($key)}}  id={{ucfirst($key)}}>
                                            @foreach ($Objects['Supp'] as $supp) 
                                                @if ($value == $supp->id)
                                                    <option>{{$supp->name}}</option>
                                                @endif
                                            @endforeach
                                            @foreach ($Objects['Supp'] as $supp) 
                                                @if ($value != $supp->id)
                                                    <option>{{$supp->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endif    
                                @if ($key == "origin")
                                <div class="col-sm-8">
                                    <select  class="form-control" name="{{ucfirst($key)}}"  id="{{ucfirst($key)}}" >
                                        @if ($value == "local")
                                            <option>Local</option>
                                            <option>Import</option>            
                                        @else
                                            <option>Import</option>
                                            <option>Local</option> 
                                        @endif
                                    </select>
                                </div>
                                @endif
                                @if ($key == "catagory")
                                    @if ($value == "fruit")
                                        <div class="col-sm-8">
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
                                        <div class="col-sm-8">
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
                                @endif
                                @if ($key == "image")
                                    <img id="invImage"  src="{{asset('storage/Images/')}}/{{$items->image}}"alt="Inventory Image" style="width: 50%;" class="img-thumbnail rounded mx-auto d-block">
                                    <div style="display: none;" id="PreviewImage" class="card" style="width: 90%;">
                                        <div class="card-body">
                                            <label for="Image">Enter Image Inventory</label>
                                            <input name="Image" type="file" class="form-control-file" onchange="displayImg(this)">
                                        </div>
                                    </div>                                 
                                @endif
                                @if ($key == "discription")
                                    <textarea readonly class="form-control-plaintext" name="Discription" id="Discription" rows="3">{{$value}}</textarea> 
                                </div>
                                @endif

                            </div>
                            @else
                                @if (in_array($key, $Objects['non_editable']))
                                    <div class="form-group row non-editable ">
                                    <label for="{{$key}}" class="col-sm col-form-label">{{$key}}</label>

                                @else 
                                    <div class="form-group row editable">
                                    <label for="{{ucfirst($key)}}" class="col-sm col-form-label">{{ucfirst($key)}}</label>
                                @endif
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" name={{ucfirst($key)}} id={{ucfirst($key)}} value="{{$value}}">
                                    </div>
                                </div>  
                            @endif                                       
                        @endif               
                    @endif
                @endforeach
        @endforeach
    </div>
</div>