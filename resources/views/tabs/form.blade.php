
<p class="col-sm-3 col-form-label">{{$Objects["form"][0]}}</p>
<div class="container">
  <div class="row">
    <div class="col">
      @if (array_key_exists("Supp",$Objects) && $Objects["form"][0] == "Inventory")
      <div id="supp" class="form-group row">
          <label for="Supplier" class="col-sm-4 col-form-label">Supplier</label>
          <div class="col-sm-7">
              <select  class="form-control col-sm-10  name="Supplier"  id="Supplier" >
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

      <div class="form-group row">
        <label for="Name" class="col-sm-4 col-form-label">{{$Objects["form"][1]}} : </label>
        <div class="col-sm-7">
          <input type="text" readonly class="form-control-plaintext" id="Name" value={{$items->name}} >
        </div>
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
        <label for="staticStock" class="col-sm-4 col-form-label">{{$Objects["form"][4]}} : </label>
        <div class="col-sm-7">
          <input type="text" readonly class="form-control-plaintext" id="staticStock" value={{$items->price}} >
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
    </div>
    <div class="col">
      <div id="Image" class="card" style="width: 90%;">
        <img id="invImage"  alt="Inventory Image" style="width: 50%;" class="img-thumbnail rounded mx-auto d-block">
        <div class="card-body">
          <label for="Image">Enter Image Inventory</label>
          <input name="file" type="file" class="form-control-file" id="Image" onchange="displayImg(this)">
        </div>
      </div>
      <div class="form-group row">
        <label for="Discription" class="col-sm-4 col-form-label">{{$Objects["form"][9]}}</label>
        <textarea readonly class="form-control-plaintext" id="Discription" rows="3">{{$items->discription}}</textarea>
      </div>
    </div>
  </div>
</div>
