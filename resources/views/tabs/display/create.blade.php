<div class="col">
    @foreach ($Objects['form'] as $key)

        @if ($Objects["title"] != "Inventory")
                <div class="form-group row">
                    <label for="{{ucfirst($key)}}" class="col-sm col-form-label">{{ucfirst($key)}}</label>
                    <div class="col-sm">
                        <input type="text" class="form-control @error('{{ucfirst($key)}}') is-invalid @enderror" name="{{ucfirst($key)}}" id="{{ucfirst($key)}}" required>
                        @error('{{ucfirst($key)}}')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
        @else
            <div class="form-group row">
                @if (in_array($key, $Objects['form']) && $key != "image" && $key != "discription" )

                    <label for="{{ucfirst($key)}}" class="col-sm col-form-label">{{ucfirst($key)}}</label>
                    <div class="col-sm">
                        @if ($key == "supplier" || $key == "origin" || $key == "catagory")
                            @if ($key == "supplier")
                                <div class="col-sm">
                                    <select  class="form-control" name="Supplier"  id="Supplier" >
                                        @foreach ($Objects['Supp'] as $supp)
                                            <option>{{$supp->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif    
                            @if ($key == "origin")
                                <div class="col-sm">
                                    <select  class="form-control" name="Origin"  id="Origin" >
                                        <option>Local</option>
                                        <option>Import</option>
                                    </select>
                                </div>
                            @endif
                            @if ($key == "catagory")
                                <div class="col-sm">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Catagory" id="Catagory" value="fruit">
                                        <label class="form-check-label" for="Catagory">Fruit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Catagory" id="Catagory" value="vegetables">
                                        <label class="form-check-label" for="Catagory">Vegetables</label>
                                    </div>
                                </div>
                            @endif
                        @else
                            <input type="text" class="form-control @error('{{ucfirst($key)}}') is-invalid @enderror" name="{{ucfirst($key)}}" id="{{ucfirst($key)}}" required>
                            @error('{{ucfirst($key)}}')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        @endif
                    </div>
                @endif

            </div>
        @endif
    @endforeach
</div>