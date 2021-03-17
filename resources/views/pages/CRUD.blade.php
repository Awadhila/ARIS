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

                                        <form action={{ route('cus.update',$items->id) }} method="post" class="mb-4">
                                            @csrf
                                            @include('tabs.form',['Objects' => $Objects])
                                            <button id="update" type="submit" class="btn btn-primary">Save changes</button>

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
    const type = @json($Objects["form"][0]);
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