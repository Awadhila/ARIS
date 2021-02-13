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
                        @include('tabs.contents.display.form',['option' => $inventory],['form' => $form])
                    </div>
                    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        @if ($supp->count())

                        <form action="{{ route('inv') }}" method="post" class="mb-4">
                            @csrf
                            <div class="form-group row">
                                <label for="Supplier" class="col-sm-2 col-form-label">Supplier</label>
                                <div class="col-sm-10">
                                    <select  class="form-control" name="Supplier"  id="Supplier" >
                                    @foreach ($supp as $supp)
                                        <option>{{$supp->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            @include('tabs.contents.register',['option' => $inventory],['form' => $form])
                        </form>
                        @else
                        <p>There are no suppliers</p>
                        @endif
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