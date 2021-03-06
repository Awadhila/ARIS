<div class="col">
    <div class="card"  style="width: 20rem;">
        <img class="card-img-top" 
            @if ($items->image != null)
                src="{{asset('storage/Images/')}}/{{$items->image}}"
            @else
                src="{{asset('storage/Images/')}}/null.png"
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
            <div class="row">
                <div class="col"><p>Price: @if ($Objects['Type'] == "delivery") {{$items->priceBuy}} @else {{$items->priceSale}} @endif</p></div>
                @if (((int)$items->stock) > 0 || $Objects["Type"] == "delivery")
                <button  value="{{$items->id}}" type="button" class="btn btn-primary atc" data-toggle="modal" data-target="#AddToCart">
                    Add to Cart
                </button>
                @else
                    <p>Out of Stock</p>
                @endif
                <p class="card-text"><small class="text-muted">Last updated {{$items->updated_at}}</small></p>

                  
            </div>

        </div>
    </div>

</div>
