<style>
    div.sticky {
      position: -webkit-sticky;
      position: sticky;
      top: 0;

    }
    </style>
<div class="sticky">
    <button type="button" class="btn btn-outline-secondary  float-right position-absolute" data-toggle="modal" data-target=".bd-example-modal-lg" style="position: -webkit-sticky; position: sticky;">Cart</button>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">My Cart</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div id="cart" class="modal-body">
                <div class="row mb-1">
                  <div class="col-sm-2 ">Name</div>
                  <div class="col-sm-2">Quantity</div>
                  <div class="col-sm-3">Price/Unit</div>
                  <div class="col-sm-2">Total</div>
                  <div class="col-sm-3">Buttons</div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
</div>