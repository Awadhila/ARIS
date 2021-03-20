@extends('layouts.app')

@section('content')

<div class="sticky">
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Transactions '.$Objects["Type"]) }}
                    @if ($Objects["Type"] != 'Type')
                    <button id="back" type="button" class="btn btn-outline-secondary  float-right ml-1" >Back</button>
                    <button type="button" class="btn btn-outline-secondary  float-right ml-1" data-toggle="modal" data-target=".bd-example-modal-lg" >Cart</button>
                    @endif
                </div>
                <div class="card-body">                       
                    @if (is_null($Objects["shop_view"]))
                        <p>Select Trasation Type</p>
                        <div class="form-group row">
                            <label for="type" class="col-sm col-form-label">Type</label>
                            <div class="col-sm">
                                <select  class="form-control"  id="type" >
                                    <option>Sales</option>
                                    <option>Delivery</option>
                                </select>
                            </div>
                            <div class="col-sm">
                                <button id="select" type="button" class="btn btn-outline-primary  float-right">Select</button>
                            </div>
                        </div>
                    @else
                    <div id="grid">              
                        @include('layouts.grid')
                        @include('tabs.display.cart')
                        @include('tabs.display.quantity')
                    </div>
                    @endif
                </div>
            </div>
            @if ($Objects["Type"] != "sales" ||$Objects["Type"] != "delivery" )
            <div class="card">
                <div class="card-header">{{ __('View Transactions ') }}</div>
                <div class="card-body">                       
                    @include('tabs.display.transactionReport')
                </div>
            </div>  
            @endif

        </div>
    </div>
</div>


<script type="text/javascript">
    let items = @json($Objects["shop_view"]);
    let clientId = @json($Objects["id"]);
    let type = @json($Objects["Type"]);
    let payment = @json($Objects["form_view"]);
    let items_tran = @json($Objects["list_view"]);
    let tab = @json($Objects["tab"]);
    console.log(payment);
    console.log(items);

    let url = "{{asset('storage/Images/')}}/";
    let urlCheckOut = "{{ route('tran') }}";
    let tranID;
    $(document).ready(function(){
        shopingCart.clearCart();   
    });
    if (tab == "credit") {
        $( "#ex1-tabs-2" ).addClass("show active" );
        $( "#tab2 a" ).addClass("active" );
        $("#tab2 a").attr("aria-selected","true");
        $( "#ex1-tabs-1" ).removeClass("show active" );
        $( "#tab1 a" ).removeClass("active");
        $("#tab1 a").attr("aria-selected","false");
    } else {
        $( "#ex1-tabs-1" ).addClass("show active" );
        $( "#tab1 a" ).addClass("active" );
        $( "#tab1 a" ).attr("aria-selected","true");
        $( "#ex1-tabs-2" ).removeClass("show active" );
        $( "#tab2 a" ).removeClass("active");
        $( "#tab2 a" ).attr("aria-selected","false");
    }
    $("#tab1").click(function(){
        if(type = "Sales View"){
            window.location = "/transactions/sales/view/debit"
        }else{
            window.location = "/transactions/delivery/view/debit"
        }
    });
    $("#tab2").click(function(){
        if(type = "Sales View"){
            window.location = "/transactions/sales/view/credit"
        }else{
            window.location = "/transactions/delivery/view/credit"
        }
    });
</script>
@endsection