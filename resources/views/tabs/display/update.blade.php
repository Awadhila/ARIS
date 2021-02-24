
@if (array_key_exists("Supp",$Objects) && $Objects["form"][0] == "Inventory")
<div class="form-group row">
    <label for="Supplier" class="col-sm-3 col-form-label">Supplier</label>
    <div class="col-sm-8">
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
<div class="form-group row" id = "f1">
<label for="Name" class="col-sm-3 col-form-label">{{$Objects['form'][1]}}</label>
<div class="col-sm-8">
  <input type="text"  class="form-control @error('Name') is-invalid @enderror" name="Name" id="Name" value={{$items->name}}>
    @error('Name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
          </span>
    @enderror
</div>
</div>
<div class="form-group row" id = "f2">
<label for="Contact" class="col-sm-3 col-form-label">{{$Objects['form'][2]}}</label>
  <div class="col-sm-8">
    <input type="text"  class="form-control @error('Contact') is-invalid @enderror" name="Contact"  id="Contact" value="{{ old('Contact') }}"  >
    @error('Contact')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
</div>

<div class="form-group row" id = "f4">
<label for="Origin" class="col-sm-3 col-form-label">Origin</label>
  <div class="col-sm-8">
    <select  class="form-control" name="Origin"  id="Origin" >
        @if ($items->trade_origin == "Local")
            <option>Local</option>
            <option>Import</option>            
        @else
            <option>Import</option>
            <option>Local</option> 
        @endif
    </select>
  </div>
</div>
<div class="form-group row" id = "f5">
<legend for = "Catagory" class="col-form-label col-sm-3">Catagory</legend>
    @if ($items->Catagory == "fruit")
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
        <div class="form-check">
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
<div class="form-group row" id = "f6">
<label for="Price" class="col-sm-3 col-form-label">Price</label>
  <div class="col-sm-8">
    <input type="text"  class="form-control @error('Price') is-invalid @enderror" name="Price"  id="Price" value={{ $items->price}}  >
    @error('Price')
      <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
    @enderror
  </div>
</div>
