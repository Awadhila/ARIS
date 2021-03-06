<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($Objects['title'] == "Inventory")

                <form action="{{ route('inv')}}" method="post" class="mb-4">
            @else
                @if ($Objects['title'] == "Customer")
                    <form action="{{ route('cus',['form','msg']) }}" method="post" class="mb-4">
                @else
                    <form action="{{ route('supp',['form','msg']) }}" method="post" class="mb-4">
                @endif
            @endif
            @csrf
                <div class="modal-body">
                @include('tabs.display.create')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @if ($Objects['title'] == "Inventory")
                    @if ($Objects["Supp"]->count())
                        <button type="submit" class="btn btn-primary">Register</button>
                    @endif
                @else
                    <button type="submit" class="btn btn-primary">Save changes</button>
                @endif
                </div>
            </form>
        </div>
    </div>
</div>
