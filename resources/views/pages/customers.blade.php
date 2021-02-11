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
                    @include('tabs.tabs')
                    <div class="tab-content" id="ex1-content">
                        @include('tabs.contents.view',['option' => $customers],['form' => $form])
                    </div>
                    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <form action="{{ route('cus') }}" method="post" class="mb-4">
                            @csrf
                            @include('tabs.contents.register',['option' => $customers],['form' => $form])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#f3").hide();
        $("#f4").hide();
        $("#f5").hide();
        $("#f6").hide();
    });
</script>
@endsection