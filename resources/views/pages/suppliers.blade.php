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
                        <input type="password" class="form-control" id="searchlbl" placeholder="What are you looking for?">
                    </div>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </form>


                    <form class = "border-top">
                        <div class="form-group row">
                            <label for="suppName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="suppName" value="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="suppContact" class="col-sm-2 col-form-label">Contact</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="suppContact" value="Contact">
                            </div>
                        </div>
                        <div class="form-group row  d-flex p-3 border-top">
                            <div class="col-sm-10">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                    <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                    </li>
                                    <button type="submit" class="btn btn-primary ml-5">Add New</button>
                                    <button type="submit" class="btn btn-primary ml-2">Delete</button>
                                </ul>


                            </nav>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection