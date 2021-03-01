
    <div class="col w-25">
        <div class="card my-5" style="width: 20rem;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img
                @if ($items->image != null)
                    src="{{asset('Images')}}/{{$items->image}}"
                @else
                    src="{{asset('Images/null.png')}}"
                @endif
                class="img-fluid"
                />
                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                </a>
            </div>
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
                    <div class="col"><p>Price: {{$items->price}}</p></div>
                    <div class="col"><a href="#!" class="btn btn-primary">Add to Cart</a></div>
                </div>
            </div>
        </div> 
    </div>




