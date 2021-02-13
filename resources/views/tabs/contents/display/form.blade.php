<div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"  aria-labelledby="ex1-tab-1">
    @if (!empty($option))
    @foreach ($option as $key=>$items)
    <div class="border-bottom  ">
        <p class="col-sm-3 col-form-label">{{$form[0]}} {{ ++$key }} </p>
        <div class="form-group col ml-1">
            @foreach ($items as $x=>$item)
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">{{$form[$x+1]}} : </label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{$item}} >
                </div>
              </div>

            @endforeach
        </div>
    </div>
    @endforeach
    
    @else
        <p>There are no {{$form[0]}}</p>
    @endif