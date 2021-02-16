@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
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
                        @include('tabs.contents.display.form',['Objects' => $Objects])
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
    $(document).ready(function(){
        $("#f2").hide();
    });
</script>
@endsection