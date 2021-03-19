<div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#sales" aria-expanded="true" aria-controls="collapseOne">
            Sales
          </button>
        </h5>
      </div>
  
      <div id="sales" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            @include('tabs.display.sales')
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#delivery" aria-expanded="false" aria-controls="collapseTwo">
            Delivery
          </button>
        </h5>
      </div>
      <div id="delivery" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
            @include('tabs.display.delivery')
        </div>
      </div>
    </div>
  </div>