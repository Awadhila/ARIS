@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Trasaction Report') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('tabs.display.transactionReport')

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    let type = @json($Objects["Type"]);
    let payment = @json($Objects["form_view"]);
    let items_tran = @json($Objects["list_view"]);
    let tab = @json($Objects["tab"]);


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
        if(type == "Sales View"){
            window.location = "/sales/view/debit"
        }else{
            window.location = "/delivery/view/debit"
        }
    });
    $("#tab2").click(function(){
        if(type == "Sales View"){ 
            window.location = "/sales/view/credit"
        }else{
            window.location = "/delivery/view/credit"
        }
    });

</script>
@endsection