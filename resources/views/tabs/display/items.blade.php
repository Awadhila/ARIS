<div class="col">
    <div class="card"  style="width: 20rem;">
        <img class="card-img-top" 
            @if ($items->image != null)
                src="{{asset('Images')}}/{{$items->image}}"
            @else
                src="{{asset('Images/null.png')}}"
            @endif
        >
        <div class="card-body">
            <h5 class="card-title">{{$items->name}}</h5>
            <p class="card-text">
                @if ($items->image != null)
                    {{$items->discription}}
                @else
                    Item has no discription
                @endif
            </p>
            <p class="card-text"><small class="text-muted">Last updated {{$items->updated_at}}</small></p>
            <div class="row">
                <div class="col"><p>Price: {{$items->price}}</p></div>
                <button id="atc" value="{{$items->id}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddToCart">
                    Add to Cart
                </button>
                  
            </div>

        </div>
    </div>

</div>
