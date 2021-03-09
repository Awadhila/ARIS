
  <div class="modal fade" id="AddToCart" tabindex="-1" role="dialog" aria-labelledby="invTitleModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="invTitleModel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img id="invImg" class="" width="100%">            
          <div class="row">
              <div class="col"><p id="invPrice"></p></div>
          </div>
            <div class="row">
              <div class="input-group">
                <span class="input-group-btn col-sm-2">
                  <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                    <span>-</span>
                  </button>
                </span>
                <input type="text" id="quantity" name="quantity" class="col-sm-4 form-control input-number" value="1" min="1" max="100">
                <span class="input-group-btn col-sm-2">
                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                        <span>+</span>
                    </button>
                </span>
              </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="add" class="btn btn btn-primary">Add</button>

        </div>
      </div>
    </div>
  </div>
