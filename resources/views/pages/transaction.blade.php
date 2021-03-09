@extends('layouts.app')

@section('content')
@include('tabs.cart')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Transactions') }}</div>
 
                    <div class="card-body">                       
                        <div id="tranasactions_type_btn" class="container-sm">
                            <button type="button" id="sale"class="btn btn-primary btn-lg btn-block">Sale Inventories</button>
                            <button type="button" id="receive" class="btn btn-secondary btn-lg btn-block">Receive Inventory</button>

                        </div>
                        <h3 id="invH3" class= "mt-5 text-center">Heading</h3>
                        <div id="grid">
                            @include('layouts.grid')
                            @include('tabs.display.quantity')
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


<script type="text/javascript">
// ***** Shoping Cart Functions Start **********
    const items = @json($Objects["shop_view"]);
    var url = "{{asset('storage/Images/')}}/:id";

    $(document).ready(function(){
        $("#invH3").hide();
        $("#grid").hide();
        shopingCart.clearCart();   
    });

</script>
@endsection