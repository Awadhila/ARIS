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

                    @include('tabs.tabs')
                    
                    <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"  aria-labelledby="ex1-tab-1">
                                @if ($Objects[$Objects["form"][0]]->count())
                                @foreach ($Objects[$Objects["form"][0]] as $items)
                                    @include('tabs.contents.display.form',['Objects' => $Objects])
                                    @endforeach
                                @else
                                    <p>There are no {{$Objects['form'][0]}}</p>
                                @endif
                            </div>

                        <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                            <form action="{{ route('inv') }}" method="post" class="mb-4">
                                @csrf
                                @if ($Objects['Supp']->count())
                                    @include('tabs.contents.register',['Objects' => $Objects])
                                @else
                                    <p>There are no suppliers</p>
                                @endif
                            </form>
                        </div>
                    </div>          
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function displayImg(input){
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#invImage").attr("src",reader.result)
            }
            reader.readAsDataURL(file);
        }
    }
    $(document).ready(function(){
        $("#f2,#f8,#Image,#Catagory,#Origin").hide();
    });
    $( "#edit" ).click(function() {
        alert("cliked");
        $( "textarea,input" ).removeClass( "form-control-plaintext" ).addClass( "form-control" ).attr("readonly", false);
        $("#tabsMenu,#searchForm,#recordsContols,#staticCatagory,#staticOrigin,.non-editable").hide();
        $("#Image,#Catagory,#Origin,#f8").show();
    });
    $( "#f8" ).click(function() {
        alert("cliked");
        $( "textarea,input" ).removeClass( "form-control" ).addClass( "form-control-plaintext" ).attr("readonly", false);
        $("#tabsMenu,#searchForm,#recordsContols,#staticCatagory,#staticOrigin,.non-editable").show();
        $("#Image,#Catagory,#Origin,#f8").hide();
    });
    $( "#ex1-tab-2" ).click(function() {
        $("#Catagory,#Origin").show();
    });
</script>
@endsection