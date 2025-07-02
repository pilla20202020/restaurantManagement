@csrf
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-underline">
                <div class="card-head p-4">
                    <header>{!! $header !!}</header>
                </div>
                <div class="card-body">


                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-default-light">Choose Table</label>
                                <select name="table_id" class="form-control" id="table_id" required>
                                        <option value="" selected disabled>Select Table</option>
                                        @foreach($tables as $table)
                                            <option value="{{$table->id}}" @if(isset($table_search)) @if($table_search == $table->id) selected @endif @endif>{{$table->name}}</option>
                                        @endforeach
                                </select>
                                <span id="textarea1-error" class="text-danger">{{ $errors->first('table_id') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12 mt-3">
                            <label class="text-default-light">Order Items</label>
                            <table class="table table-bordered" id="orderItemsTable">
                                <thead>
                                    <tr>
                                        <th>Food Menu</th>
                                        <th>Rate</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>
                                            <button type="button" class="btn btn-sm btn-success p-2" onclick="addRow()"> <i class="fas fa-plus"></i></button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="orderItemsBody">
                                    <tr>
                                        <td>
                                            <select name="foodmenu_ids[]" class="form-control foodmenu-select" required>
                                                <option value="" disabled selected>Select Food</option>
                                                @foreach($foodmenus as $foodmenu)
                                                    <option value="{{ $foodmenu->id }}" data-price="{{ $foodmenu->price }}">{{ $foodmenu->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="rates[]" class="form-control rate" readonly></td>
                                        <td><input type="number" name="quantities[]" class="form-control qty" min="1" value="1"></td>
                                        <td><input type="text" name="totals[]" class="form-control total" readonly></td>
                                        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeRow(this)"><i class="fas fa-trash-alt p-1"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-3">
                        <div class="d-flex justify-content-center">
                            <input type="submit" name="pageSubmit" class="btn btn-primary waves-effect waves-light me-1">
                            <a class="btn btn-secondary waves-effect" href="{{ route('page.index') }}">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-md-3">
        <div class="card">
            <div class="card-underline">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-sm-12">
                            <label class="text-default-light">Image</label>
                            @if(isset($order) && $order->image)
                                <input type="file" name="image" class="dropify" id="input-file-events"
                                    data-default-file="{{ asset(str_replace('\\', '/', $order->image)) }}"/>
                            @else
                                <input type="file" name="image" class="dropify"/>
                            @endif
                            <input type="hidden" name="removeimage" id="removeimage" value=""/>
                            <span id="textarea1-error" class="text-danger">{{ $errors->first('image') }}</span>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div> --}}
</div>
@push('scripts')
    <!-- tinymce js -->
<script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>

<!-- init js -->
<script src="{{ asset('backend/assets/js/orders/form-editor.init.js') }}"></script>
<script>
let rowToDelete = null;

function calculateRow(row) {
    const rate = parseFloat(row.querySelector('.rate').value) || 0;
    const qty = parseFloat(row.querySelector('.qty').value) || 0;
    row.querySelector('.total').value = (rate * qty).toFixed(2);
}

document.addEventListener('input', function (e) {
    if (e.target.classList.contains('qty')) {
        calculateRow(e.target.closest('tr'));
    }
});

document.addEventListener('change', function (e) {
    if (e.target.classList.contains('foodmenu-select')) {
        const selected = e.target.selectedOptions[0];
        const price = selected.getAttribute('data-price');
        const row = e.target.closest('tr');
        row.querySelector('.rate').value = price;
        calculateRow(row);
    }
});

function addRow() {
    const table = document.getElementById('orderItemsBody');
    const newRow = table.rows[0].cloneNode(true);

    newRow.querySelectorAll('input, select').forEach(el => {
        el.value = '';
    });

    // Set default quantity to 1
    newRow.querySelector('.qty').value = 1;
    newRow.querySelector('.rate').value = '';
    newRow.querySelector('.total').value = '';

    table.appendChild(newRow);
}

// Trigger modal before deleting
function removeRow(btn) {
    rowToDelete = btn.closest('tr');
    const foodSelect = rowToDelete.querySelector('.foodmenu-select');
    const selectedFood = foodSelect.options[foodSelect.selectedIndex]?.text || 'this item';
    document.getElementById('orderTitle').innerText = selectedFood;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}

// Confirm deletion
function confirmDeleteRow() {
    if (rowToDelete) {
        const table = document.getElementById('orderItemsBody');
        if (table.rows.length > 1) {
            rowToDelete.remove();
        }
        rowToDelete = null;
    }
}
</script>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete "<strong id="orderTitle"></strong>" from the order?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="confirmDeleteRow()" data-bs-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
@endpush
