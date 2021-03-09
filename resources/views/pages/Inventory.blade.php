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
                                @if ($Objects["form_view"]->count())
                                    @foreach ($Objects["form_view"] as $items)
                                    @include('tabs.display.controls',['Objects' => $Objects])

                                        <form action={{ route('inv.update',$items->id) }}  method="post" enctype="multipart/form-data"class="mb-4">
                                            @csrf
                                            @include('tabs.form',['Objects' => $Objects])
                                            <button id="update" type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    @endforeach
                                @else
                                    @include('tabs.display.controls',['Objects' => $Objects])
                                    <p>There are no {{$Objects['form'][0]}}</p>
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
    function displayImg(input){
        alert('running');

        var file = $("input[type=file]").get(0).files[0];
        console.log(file);

        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#invImage").attr("src",reader.result)
            }
            reader.readAsDataURL(file);
        }
    }
    var url = '{{ route("inv.delete", ":id") }}';

    $(document).ready(function(){
        $("#update,#origin_update,#supp,#f8,#PreviewImage,#catagory_update,#update").hide();
    });
 

</script>
@endsection