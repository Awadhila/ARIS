
<div class="form-group row  d-flex p-3 border-top" id = "f7">
    <div class="col-sm-10">
        <div id="recordsContols"class="container">
            <div class="row">
                <div class="col-sm">
                {{$Objects["Inventory"]->links(("pagination::bootstrap-4")) }}
                </div>
                <div class="col-sm">
                    <nav>

                        <button  id="new" value="Create" type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#create">
                            Add New
                        </button>
                        <button  type="button" class="btn btn-primary ml-2" value ="Delete">Delete</button>
                        <button  type="button"  value="Update" id="edit" class="btn btn-primary ml-2" data-toggle="modal" data-target="#update">
                            Edit
                        </button>
                    </nav>
                </div>
            </div> 
        </div>
    </div>
  </div> 