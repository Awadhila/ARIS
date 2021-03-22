@extends('layouts.app')

@section('content')

<div class="sticky">
</div>
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Transactions '.$Objects["Type"]) }}
                    
                    <button style="display: none;" id="back" type="button" class="btn btn-outline-secondary  float-right ml-1" >Back</button>
                    <button style="display: none;" id="cartBtn" type="button" class="btn btn-outline-secondary  float-right ml-1" data-toggle="modal" data-target=".bd-example-modal-lg" >Cart</button>
                </div>
                <div class="card-body">                       
                    @if ($Objects["Type"] == "Select" && $Objects["shop_view"]->count())
                        <p>Select Trasaction Type</p>
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
                    @elseif($Objects["Type"] != "Select" )
                        <div id="grid">              
                            @include('layouts.grid')
                            @include('tabs.display.cart')
                            @include('tabs.display.quantity')
                        </div> 
                    @else
                        <p>There is no Inventroy</p>
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>


<script type="text/javascript">
    let items = @json($Objects["shop_view"]);
    let clientId = @json($Objects["id"]);
    let type = @json($Objects["Type"]);
    let customers = @json($Objects["customers"]);
    let suppliers = @json($Objects["suppliers"]);


    let url = "{{asset('storage/Images/')}}/";
    let urlCheckOut = "{{ route('tran') }}";
    let tranID;
    $("#back","#cartBtn").hide();
    if (type != 'Select'){
        $("#back,#cartBtn").show();
    } 

    $(document).ready(function(){
        shopingCart.clearCart();   
    });
</script>
@endsection