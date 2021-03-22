@if ($key == "supplier" ||$key == "image"  )
    <div class="col">
@endif

@if (in_array($key, $Objects['form']))
    <div class="form-group row editable">
@else
    <div class="form-group row non-editable">
@endif

<label for={{ucfirst($key)}} class="col-sm-4 col-form-label">{{ucfirst($key)}}:</label>

@if ($key == "supplier")
    <div class="col-sm">
        <input type="text" readonly class="form-control-plaintext staticUpdatable" name={{ucfirst($key)}} id={{ucfirst($key)}} value="{{$items['suppliers']->name}}">

        <select style="display: none;" class="form-control updatable" name={{ucfirst($key)}}  id={{ucfirst($key)}}>
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
@elseif ($key == "origin")
<div class="col-sm">
    <input type="text" readonly class="form-control-plaintext staticUpdatable" name={{ucfirst($key)}} id={{ucfirst($key)}} value="{{$value}}">

    <select style="display: none;" class="form-control updatable" name="{{ucfirst($key)}}"  id="{{ucfirst($key)}}" >
        @if ($value == "local")
            <option>Local</option>
            <option>Import</option>            
        @else
            <option>Import</option>
            <option>Local</option> 
        @endif
    </select>
</div>
@elseif ($key == "catagory")
    <div class="col-sm">
        <input type="text" readonly class="form-control-plaintext staticUpdatable" name={{ucfirst($key)}} id={{ucfirst($key)}} value="{{$value}}">
        <div style="display: none;" class="updatable" >
            @if ($value == "fruit")
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="Catagory" id="Catagory" value="fruit" checked>
                        <label class="form-check-label" for="Catagory">Fruit</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="Catagory" id="Catagory" value="vegetables">
                        <label class="form-check-label" for="Catagory">Vegetables</label>
                    </div>
            @else
                <div class="col-sm">
                    <div class="form-check-inline" >
                        <input class="form-check-input" type="radio" name="Catagory" id="Catagory" value="fruit">
                        <label class="form-check-label" for="Catagory">Fruit</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="Catagory" id="Catagory" value="vegetables" checked>
                        <label class="form-check-label" for="Catagory">Vegetables</label>
                    </div>
                </div>
            @endif
        </div>
    </div>

@elseif ($key == "image")
    <img id="invImage"  src="{{asset('storage/Images/')}}/{{$items->image}}"alt="Inventory Image" style="width: 50%;" class="img-thumbnail rounded mx-auto d-block">
    <div style="display: none;" id="PreviewImage" class="card" style="width: 90%;">
        <div class="card-body">
            <label for="Image">Enter Image Inventory</label>
            <input name="Image" type="file" class="form-control-file" onchange="displayImg(this)">
        </div>
    </div>
@elseif ($key == "discription")
    <textarea readonly class="form-control-plaintext" name="Discription" id="Discription" rows="3">{{$value}}</textarea> 
@else
    <div class="col-sm">
        <input type="text" readonly class="form-control-plaintext" name={{ucfirst($key)}} id={{ucfirst($key)}} value="{{$value}}">
    </div>
@endif
</div>
@if ($key == "priceSale" ||$key == "discription"  )
    </div>
@endif