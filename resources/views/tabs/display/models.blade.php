<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($Objects['form'][0] != "Inventory")
                @if ($Objects['form'][0] == "Customer")
                    <form action="{{ route('cus') }}" method="post" class="mb-4">
                @else
                    <form action="{{ route('supp') }}" method="post" class="mb-4">
                @endif
            @else
                <form action="{{ route('inv')}}" method="post" class="mb-4">
            @endif
            @csrf
                <div class="modal-body">
                @include('tabs.display.create')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @if ($Objects['form'][0] == "Inventory")
                    @if ($Objects["Supp"]->count())
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    @endif
                @else
                    <button type="submit" class="btn btn-primary">Save changes</button>
                @endif
                </div>
            </form>
        </div>
    </div>
</div>
  <!-- Modal -->
<div class="modal fade" id="AddToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>