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
            @if ($Objects["Type"] == "Type")
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
// ***** Shoping Cart Functions Start **********
    const items = @json($Objects["shop_view"]);
    const clientId = @json($Objects["id"]);
    const type = @json($Objects["Type"]);
    const payments = @json($Objects["form_view"]);
    const sales = @json($Objects["Sales"]);
    const delivery = @json($Objects["delivery"]);
    console.log(payments);
    console.log(sales);
    console.log(delivery);

    var url = "{{asset('storage/Images/')}}/";
    var urlCheckOut = "{{ route('tran') }}";
    var tranID;
    $(document).ready(function(){
        shopingCart.clearCart();   
    });

</script>
@endsection