@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($Objects['title']) }}</div>

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
                                @if ($Objects['form_view']->count())
                                    @foreach ($Objects['form_view'] as $items)
                                    @include('tabs.display.controls',['Objects' => $Objects])
                                        @if ($Objects['title'] == "Customer")
                                            <form action={{ route('cus.update',$items->id) }} method="post" class="mb-4">
                                        @else
                                            <form action={{ route('supp.update',$items->id) }} method="post" class="mb-4">
                                        @endif
                                            @csrf
                                            @include('tabs.form',['Objects' => $Objects])
                                            <button style="display:none;" id="update" type="submit" class="btn btn-primary">Update Changes</button>

                                        </form>

                                    @endforeach
                                @else
                                    @include('tabs.display.controls',['Objects' => $Objects])
                                    <p>There are no {{$Objects['title']}}</p>
                                @endif
                                @include('tabs.display.models')
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
    const type = @json($Objects['title']);
    const tab = @json($Objects['tab']);
    if (type == "Customer") {
        var url = '{{ route("cus.delete", ":id") }}';
    } else {
        var url = '{{ route("supp.delete", ":id") }}';
    }

    $(document).ready(function(){
        $("#update").hide();
    });

    if (tab == "list") {
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
        if(type == "Customer"){
            window.location = "/customers/form"
        }else{
            window.location = "/suppliers/form"
        }
    });
    $("#tab2").click(function(){
        if(type == "Customer"){ 
            window.location = "/customers/list"
        }else{
            window.location = "/suppliers/list"
        }
    });
</script>
@endsection