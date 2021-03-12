
<form id="checkOutCart">
  @csrf


    <div id="cartModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                <button id="checkoutBtn"type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
    </div>
</form>
