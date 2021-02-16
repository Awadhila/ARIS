<div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"  aria-labelledby="ex1-tab-1">
    @if (!empty($Objects["form"][0]))
    @foreach ($Objects[$Objects["form"][0]] as $items)
      <div class="border-bottom  ">
        {{$Objects["Inventory"]->links(("pagination::bootstrap-4")) }}
        <p class="col-sm-3 col-form-label">{{$Objects["form"][0]}}</p>
        <div class="form-group col ml-1">
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">{{$Objects["form"][1]}} : </label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{$items->name}} >
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">{{$Objects["form"][2]}} : </label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{$items->trade_origin}} >
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">{{$Objects["form"][3]}} : </label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{$items->Catagory}} >
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">{{$Objects["form"][4]}} : </label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{$items->stock}} >
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">{{$Objects["form"][5]}} : </label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{$items->availible}} >
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">{{$Objects["form"][6]}} : </label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{$items->damaged}} >
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">{{$Objects["form"][7]}} : </label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{$items->sold}} >
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">{{$Objects["form"][8]}} : </label>
            <div class="col-sm-8">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{$items->price}} >
            </div>
          </div>
        </div>
      </div>
    @endforeach

    @else
        <p>There are no {{$Objects['form'][0]}}</p>
    @endif
</div>