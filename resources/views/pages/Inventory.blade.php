@extends('layouts.app')

@section('content')
<div class=" container">
    <div class="row justify-content-center">
        <div class="w-75 p-3 col-md-16">
            <div class="card">
                <div class="card-header">{{ __('Inventory') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('layouts.tabs')
                    <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"  aria-labelledby="ex1-tab-1">
                                <div class="border-bottom  ">
                                    @if ($Objects[$Objects["form"][0]]->count())
                                        @foreach ($Objects[$Objects["form"][0]] as $items)
                                            @include('tabs.display.controls',['Objects' => $Objects])
                                            <form action={{ route('inv.update',$items->id) }}  method="post" enctype="multipart/form-data"class="mb-4">
                                                @csrf
                                                @include('tabs.form',['Objects' => $Objects])
                                                
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>

                                            @include('tabs.display.models')

                                        @endforeach
                                    @else
                                        <p>There are no {{$Objects['form'][0]}}</p>
                                    @endif
                                </div>
                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                            @include('tabs.list',['Objects' => $Objects])
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

$(document).ready(function(){
    $("#f2,#origin_update,#supp,#f8,#PreviewImage,#catagory_update,#update").hide();
});
$( "#edit" ).click(function() {
    alert("cliked");
    $( "textarea,input" ).removeClass( "form-control-plaintext" ).addClass( "form-control" ).attr("readonly", false);
    $("#tabsMenu,#searchForm,#recordsContols,#staticCatagory,#staticOrigin,.non-editable,#origin,#catagory").hide();
    $("#PreviewImage,#origin_update,#supp,#catagory_update,#update").show();
});
$( "#update" ).click(function() {
    alert("cliked");
    $( "textarea,input" ).removeClass( "form-control" ).addClass( "form-control-plaintext" ).attr("readonly", false);
    $("#tabsMenu,#searchForm,#recordsContols,#staticCatagory,#staticOrigin,.non-editable,#origin,#catagory").show();
    $("#PreviewImage,#origin_update,#supp,#catagory_update,#update").hide();
});

</script>
@endsection