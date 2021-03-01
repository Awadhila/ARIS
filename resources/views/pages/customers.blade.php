@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Customres') }}</div>

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

                                        <form action={{ route('cus.update',$items->id) }} method="post" class="mb-4">
                                            @csrf
                                            @include('tabs.form',['Objects' => $Objects])
                                            <button id="update" type="submit" class="btn btn-primary">Save changes</button>

                                        </form>

                                    @endforeach
                                @else
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
    $( "#delBtn" ).click(function (){
        var url = '{{ route("cus.delete", ":id") }}';
        url = url.replace(':id', $(this).val());
        $("#delete").attr("href", url )
    });
    $(document).ready(function(){
        $("#update").hide();
    });
    $( "#edit" ).click(function() {
        alert("cliked");
        $( "input" ).removeClass( "form-control-plaintext" ).addClass( "form-control" ).attr("readonly", false);
        $("#tabsMenu,#searchForm,#recordsContols").hide();
        $("#update").show();
    });
    $( "#update" ).click(function() {
        alert("cliked");
        $( "input" ).removeClass( "form-control" ).addClass( "form-control-plaintext" ).attr("readonly", false);
        $("#tabsMenu,#searchForm,#recordsContols").show();
        $("#update").hide();
    });

</script>
@endsection