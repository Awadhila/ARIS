@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Suppliers') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="form-inline d-flex p-1">
                    <div class="form-group mb-2">
                        <label for="searchlbl" class="sr-only">Search</label>
                        <input type="text" readonly class="form-control-plaintext" id="searchlbl" value="Search">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="searchtb" class="sr-only">Search</label>
                        <input type="text" class="form-control" id="searchlbl" placeholder="What are you looking for?">
                    </div>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </form>
                    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a
                            class="nav-link active"
                            id="ex1-tab-1"
                            data-toggle="tab"
                            href="#ex1-tabs-1"
                            role="tab"
                            aria-controls="ex1-tabs-1"
                            aria-selected="true"
                            >View</a
                          >
                        </li>
                        <li class="nav-item" role="presentation">
                          <a
                            class="nav-link "
                            id="ex1-tab-2"
                            data-toggle="tab"
                            href="#ex1-tabs-2"
                            role="tab"
                            aria-controls="ex1-tabs-2"
                            aria-selected="false"
                            >Register</a
                          >
                        </li>

                      </ul>
                      <div class="tab-content" id="ex1-content">
                        <div
                          class="tab-pane fade show active"
                          id="ex1-tabs-1"
                          role="tabpanel"
                          aria-labelledby="ex1-tab-1"
                        >
                                
                            @if ($suppliers->count())
                            <div class=" border-bottom form-group row  ml-1">
                                <label class="col-sm-2 col-form-label">##</label>
                                <label class="col-sm-2 col-form-label">Name</label>
                                <label class="col-sm-2 col-form-label">Contact</label>

                            </div>
                            @foreach ($suppliers as $key=>$supplier)
                            <div class="border-bottom  ">
                                <div class="form-group row ml-1">
                                    <p class="col-sm-2 col-form-label">{{ ++$key }} )</p>
                                    <p class="col-sm-2 col-form-label" >
                                        {{$supplier->name}}
                                    </p>
                                    <p class="col-sm-2 col-form-label">
                                        {{$supplier->contact}}                                    
                                    </p>
                                </div>
                            </div>
                            @endforeach

                            @else
                                <p>There are no suppliers</p>
                            @endif

                        </div>
                        <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                            <form action="{{ route('supp') }}" method="post" class="mb-4">
                                @csrf
                                <div class="form-group row">
                                    <label for="suppName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">

                                        <input type="text"  class="form-control @error('suppName') is-invalid @enderror" name="suppName" id="suppName" value="{{ old('suppName') }}">
                                        @error('suppName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="suppContact" class="col-sm-2 col-form-label">Contact</label>
                                    <div class="col-sm-10">
                                        <input type="text"  class="form-control @error('suppContact') is-invalid @enderror" name="suppContact"  id="suppContact" value="{{ old('suppContact') }}"  >
                                        @error('suppContact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row  d-flex p-3 border-top">
                                    <div class="col-sm-10">
                                        <nav>
                                            <input type="submit" class="btn btn-primary ml-5" value="Add New">
                                            <input type="submit" class="btn btn-primary ml-2" value ="Delete">
                                        </nav>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection