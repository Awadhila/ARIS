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
                            <form action="{{ route('inv')}}" method="post" class="mb-4">
                                @csrf
                                <div class="border-bottom  ">
                                    @if ($Objects[$Objects["form"][0]]->count())
                                        @foreach ($Objects[$Objects["form"][0]] as $items)
                                            @include('tabs.display.controls',['Objects' => $Objects])
                                            @include('tabs.form',['Objects' => $Objects])
                                            @include('tabs.display.models')

                                        @endforeach
                                    @else
                                        <p>There are no {{$Objects['form'][0]}}</p>
                                    @endif
                                </div>
                            </form>
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
        $("#f2,#Image").hide();
    });

    $("#new").click(function(){
        var val = $("#new").val();
        $("#ModalLongTitle").html(val);
    });
    $("#edit").click(function(){
        var val = $("#edit").val();
        $("#ModaleditTitle").html(val);
    });
    $("#new").click(function(){
        alert();
    });
</script>
@endsection