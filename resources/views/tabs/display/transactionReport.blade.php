
@if ($Objects['tab'] != null)
  @if ($Objects['Type'] == "Delivery View")
    @include('tabs.display.trans_view')
  @else
    @include('tabs.display.trans_view')
  @endif
@else
  <div class="container">
    <div class="row">
      <div class="col-sm"  align="center">
        <button id="delivery_view" type="button" class="btn btn-outline-primary btn-lg btn-block">Delivery</button>
      </div>
      <div class="col-sm"  align="center">
        <button id="sales_view" type="button" class="btn btn-outline-primary btn-lg btn-block">Sales</button>
      </div>
      </div>
    </div>
  </div>
@endif