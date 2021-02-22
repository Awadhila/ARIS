
<div class="border-bottom  ">
  <div id="recordsContols"class="container">
    <div class="row">
      <div class="col-sm">
        {{$Objects["Inventory"]->links(("pagination::bootstrap-4")) }}
      </div>
      <div class="col-sm">
        <button id="edit" type="submit" class="btn btn-primary">
          {{ __('Edit Reccord') }}
        </button> 
      </div>
    </div>
  </div>        
  <p class="col-sm-3 col-form-label">{{$Objects["form"][0]}}</p>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-5 col-form-label">{{$Objects["form"][1]}} : </label>
          <div class="col-sm-7">
            <input type="text" readonly class="form-control-plaintext" id="staticName" value={{$items->name}} >
          </div>
        </div>
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-5 col-form-label">{{$Objects["form"][2]}} : </label>
          <div class="col-sm-7">
            <input type="text" readonly class="form-control-plaintext" id="staticOrigin" value={{$items->trade_origin}} >
            <select  class="form-control" name="Origin"  id="Origin"  value={{$items->trade_origin}}>
              <option>Local</option>
              <option>Import</option>
            </select>
          </div>
        </div>
        <div class="form-group row ">
          <label for="staticCatagory" class="col-sm-5 col-form-label">{{$Objects["form"][3]}} : </label>
          <div class="col-sm-7">
            <input type="text" readonly class="form-control-plaintext" id="staticCatagory" value={{$items->Catagory}} >
            <select  class="form-control" name="Origin"  id="Catagory"  value={{$items->Catagory}}>
              <option>Fruit</option>
              <option>Vegitables</option>
            </select>
          </div>
        </div>
    
        <div class="form-group row non-editable">
          <label for="staticStock" class="col-sm-5 col-form-label">{{$Objects["form"][4]}} : </label>
          <div class="col-sm-7">
            <input type="text" readonly class="form-control-plaintext" id="staticStock" value={{$items->stock}} >
          </div>
        </div>
        <div class="form-group row non-editable">
          <label for="staticAvailible" class="col-sm-5 col-form-label">{{$Objects["form"][5]}} : </label>
          <div class="col-sm-7">
            <input type="text" readonly class="form-control-plaintext" id="staticAvailible" value={{$items->availible}} >
          </div>
        </div>
        <div class="form-group row non-editable">
          <label for="staticDamaged" class="col-sm-5 col-form-label">{{$Objects["form"][6]}} : </label>
          <div class="col-sm-7">
            <input type="text" readonly class="form-control-plaintext" id="staticDamaged" value={{$items->damaged}} >
          </div>
        </div>
        <div class="form-group row non-editable">
          <label for="staticSold" class="col-sm-5 col-form-label">{{$Objects["form"][7]}} : </label>
          <div class="col-sm-7">
            <input type="text" readonly class="form-control-plaintext" id="staticSold" value={{$items->sold}} >
          </div>
        </div>
        <div class="form-group row">
          <label for="staticPrice" class="col-sm-5 col-form-label">{{$Objects["form"][8]}} : </label>
          <div class="col-sm-7">
            <input type="text"  readonly class="form-control-plaintext" id="staticPrice" value={{$items->price}} >
          </div>
        </div>

      </div>
      <div class="col">
        2 of 2
        <div class="form-group row">
          <label for="staticDiscription" class="col-sm-5 col-form-label">{{$Objects["form"][9]}}</label>
          <textarea readonly class="form-control-plaintext" id="staticDiscription" rows="3">{{$items->discription}}</textarea>
        </div>
      </div>
    </div>

      <div id="Image" class="form-group row">
        <label for="staticImage">Enter Image Inventory</label>
        <input type="file" class="form-control-file" id="staticImage">
      </div>
    <div class="form-group row">
      <input  id = "f8" type="submit" class="btn btn-primary ml-5" value="Make Edit">
    </div>
  </div>


</div>
