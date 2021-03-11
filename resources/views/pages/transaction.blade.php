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
                        <h3 id="invH3" class= "mt-5 text-center">Heading</h3>
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
            </div>
        </div>
</div>


<script type="text/javascript">
// ***** Shoping Cart Functions Start **********
    const items = @json($Objects["shop_view"]);
    var url = "{{asset('storage/Images/')}}/";
    var urlCheckOut = "{{ route('tran') }}";

    $(document).ready(function(){
        $("#invH3").hide();
        //$("#grid").hide();
        shopingCart.clearCart();   
    });

</script>
@endsection