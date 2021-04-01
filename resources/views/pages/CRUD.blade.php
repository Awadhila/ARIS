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
                                        @if(session()->has('message'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Sucsses</strong> {{session()->get('message')}}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        @if ($Objects['title'] == "Customer")
                                            <form action={{ route('cus.update',$items->id) }} method="post" class="mb-4">
                                        @else
                                            <form action={{ route('supp.update',$items->id) }} method="post" class="mb-4">
                                        @endif
                                            @csrf
                                            @include('tabs.form',['Objects' => $Objects])
                                            <button style="display:none;" id="update" type="submit" class="btn btn-primary">Update Changes</button>
                                        </form>
                                        @if ($Objects['title'] =="Supplier" )
                                            @if ( $items['inventories']->count())
                                                <div class="border-bottom form-group row ml-1">
                                                    <p class="col-sm-1 col-form-label">{{ '##' }}</p>
                                                    @foreach ($items['inventories'][0]->toArray() as $key=>$value)
                                                        @if($key == 'name' || $key == 'origin' || $key == 'catagory'|| $key == 'priceBuy')
                                                            <p class="col-sm col-form-label">{{ucfirst($key)}}</p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                @foreach ($items['inventories'] as $x=>$inv)
                                                <div class="border-bottom form-group row ml-1">
                                                    <p class="col-sm-1 col-form-label">{{ ++$x }} )</p>
                                                    @foreach ($inv->toArray() as $key=>$value)
                                                        @if($key == 'name' || $key == 'origin' || $key == 'catagory'|| $key == 'priceBuy')
                                                            <p class="col-sm col-form-label">{{ucfirst($value)}}</p>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                @endforeach
                                            @else
                                                <p>Supplier has no registered inventories<p> 
                                            @endif                                           
                                        @endif
                                     
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

</script>
@endsection