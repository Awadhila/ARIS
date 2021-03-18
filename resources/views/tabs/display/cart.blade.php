
<form id="checkOutCart">
  @csrf
    <div id="cartModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">My Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div id="cart" class="modal-body">
                    <div class="row mb-1">
                      <div class="col-sm">Name</div>
                      <div class="col-sm">Quantity</div>
                      <div class="col-sm">Price/Unit</div>
                      <div class="col-sm">Total</div>
                      <div class="col-sm">Buttons</div>
                    </div>
              </div>
              <div class="modal-footer">
                <div class="row">
                    <label for="Status" class="col-sm col-form-label">Status</label>
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="Status" id="status" value="True" checked>
                    <label class="form-check-label" for="status">
                      Debit
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="Status" id="status" value="False">
                    <label class="form-check-label" for="status">
                      Credit
                    </label>
                  </div>
                    <button id="checkoutBtn"type="submit" class="btn btn-primary">Check Out</button>
                </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</form>
