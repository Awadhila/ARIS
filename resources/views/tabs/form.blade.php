<p class="col-sm-3 col-form-label">{{$Objects["form"][0]}}</p>
<div class="container">
    <div class="row">
        @if ($Objects["form"][0] == "Customer" || $Objects["form"][0] ==  "Supplier")
            <div class="col">
                <div class="form-group row">
                    <label for="Name" class="col-sm-4 col-form-label">{{$Objects['form'][1]}}</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext @error('Name') is-invalid @enderror" name="Name" id="Name" value="{{$items->name}}">
                        @error('Name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="contact" class="col-sm-4 col-form-label">{{$Objects['form'][2]}}</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext @error('Contact') is-invalid @enderror" name="contact" id="contact" value={{$items->contact}}>
                        @error('Contact')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
            </div>    
        @else
            <div class="col">
                @if (array_key_exists("Supp",$Objects) && $Objects["form"][0] == "Inventory")
                <div class="form-group row" id = "supp">
                  <label for="Supplier" class="col-sm-4 col-form-label">Origin</label>
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
            </div>
            <div class="form-group row" id="origin" >
                <label for="Origin" class="col-sm-4 col-form-label">{{$Objects["form"][2]}} : </label>
                <div class="col-sm-7">
                    <input type="text" readonly class="form-control-plaintext" id="sOrigin" value={{$items->trade_origin}} >
                </div>
            </div>
            <div class="form-group row" id = "origin_update">
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
            <div class="form-group row " id = "catagory">
                <label for="staticCatagory" class="col-sm-4 col-form-label">{{$Objects["form"][3]}} : </label>
                <div class="col-sm-7">
                    <input type="text" readonly class="form-control-plaintext" id="staticCatagory" value={{$items->Catagory}} >
                </div>
            </div>   
            <div class="form-group row" id = "catagory_update">
                <legend for = "Catagory" class="col-form-label col-sm-4">Catagory</legend>
                @if ($items->Catagory == "fruit")
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
        
            <div class="form-group row">
            <label for="Price" class="col-sm-4 col-form-label">Price</label>
                <div class="col-sm-7">
                    <input type="text" readonly class="form-control-plaintext @error('Price') is-invalid @enderror" name="Price"  id="Price" value={{$items->price}}  >
                    @error('Price')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="form-group row non-editable">
                <label for="staticAvailible" class="col-sm-4 col-form-label">{{$Objects["form"][5]}} : </label>
                <div class="col-sm-7">
                    <input type="text" readonly class="form-control-plaintext" id="staticAvailible" value={{$items->availible}} >
                </div>
            </div>
            <div class="form-group row non-editable">
                <label for="staticDamaged" class="col-sm-4 col-form-label">{{$Objects["form"][6]}} : </label>
                <div class="col-sm-7">
                    <input type="text" readonly class="form-control-plaintext" id="staticDamaged" value={{$items->damaged}} >
                </div>
            </div>
            <div class="form-group row non-editable">
                <label for="staticSold" class="col-sm-4 col-form-label">{{$Objects["form"][7]}} : </label>
                <div class="col-sm-7">
                    <input type="text" readonly class="form-control-plaintext" id="staticSold" value={{$items->sold}} >
                </div>
            </div>
            <div class="form-group row  non-editable">
                <label for="Price" class="col-sm-4 col-form-label">{{$Objects["form"][8]}} : </label>
                <div class="col-sm-7">
                    <input type="text"  readonly class="form-control-plaintext" id="Price" value={{$items->stock}} >
                </div>
            </div>
            <div class="col">
                <div id="PreviewImage" class="card" style="width: 90%;">
                    <img id="invImage"  alt="Inventory Image" style="width: 50%;" class="img-thumbnail rounded mx-auto d-block">
                    <div class="card-body">
                        <label for="Image">Enter Image Inventory</label>
                        <input name="Image" type="file" class="form-control-file" onchange="displayImg(this)">
                    </div>
                </div>
            
                <div class="form-group col">
                    <label for="Discription" class="col-sm-4 col-form-label">{{$Objects["form"][9]}}</label>
                    <textarea readonly class="form-control-plaintext" name="Discription" id="Discription" rows="3">{{$items->discription}}</textarea>
                    @error('Price')
                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>  
        @endif
    </div>
</div>