
<div class="form-group row  d-flex p-3 border-top" id = "f7">
    <div class="col-sm-10">
        <div id="recordsContols"class="container">
                <div class="row-sm">
                {{$Objects['form_view']->links(("pagination::bootstrap-4")) }}
                </div>
                <div class="row-sm">
                    <nav>

                        <button  id="new" value="Create" type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#create">
                            Add New
                        </button>
                        
                        <a id="delete" class="link-unstyled" href=""><button  id="delBtn" type="button" class="btn btn-primary ml-2" @if ($Objects['form_view']->count()) value = "{{$items->id}}" @endif >Delete</button></a>
                        <button  type="button"  value="Update" id="edit" class="btn btn-primary ml-2"> 
                           Edit
                        </button>

                    </nav>
                </div>
        </div>
    </div>
  </div> 