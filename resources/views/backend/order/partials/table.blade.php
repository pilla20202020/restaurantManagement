<tr>
    <td>#{{ $order->id }}</td>
    <td>{{ $order->customer->name ?? 'N/A' }}</td>
    <td>{{ $order->table->name ?? 'N/A' }}</td>
    <td>
        <ul class="list-unstyled mb-0">
            @foreach($order->details as $detail)
                <li>
                    {{ $detail->foodMenu->name ?? 'N/A' }} ({{ $detail->quantity }} x {{ number_format($detail->rate, 2) }}) = {{ number_format($detail->amount, 2) }}
                </li>
            @endforeach
        </ul>
    </td>
    <td>{{ ucfirst($order->payment_type) }}</td>
    <td>{{ number_format($order->total_amount, 2) }}</td>
    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
    <td>
        @if($order->status == 'paid')
            <span class="badge rounded-pill text-bg-success">Paid</span>
        @elseif($order->status == 'unpaid')
            <span class="badge rounded-pill text-bg-warning">Unpaid</span>
        @elseif($order->status == 'credit')
            <span class="badge rounded-pill text-bg-danger">Credit</span>
        @else
            <span class="badge rounded-pill text-bg-secondary">Unknown</span>
        @endif
    </td>
    <td class="text-right">
        <button class="btn btn-flat btn-primary btn-xs" title="View"
            onclick="openViewOrderModal({{ $order->id }})">
            <i class="fas fa-eye"></i>
        </button>

        @if($order->status !== 'paid')
            <button class="btn btn-flat btn-info btn-xs" title="Update Payment"
                onclick="openPaymentStatusModal(
                    {{ $order->id }},
                    {{ $order->total_amount }},
                    '{{ $order->status }}',
                    {{ $order->customer_id ?? 'null' }},
                    '{{ route('order.updatePayment', $order->id) }}',
                    '{{ $order->payment_type ?? 'cash' }}'
                )">
                <i class="fas fa-money-bill"></i>
            </button>

            <button class="btn btn-flat btn-danger btn-xs" title="Delete" onclick="openDeleteorderModal({{ $order->id }}, '{{ $order->name }}')">
                <i class="fas fa-trash-alt"></i>
            </button>
        @endif
    </td>
</tr>


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the order "<strong id="orderTitle"></strong>"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" action="" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="viewOrderModal" tabindex="-1" role="dialog" aria-labelledby="viewOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="viewOrderContent">
                <div class="text-center text-muted">Loading...</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="paymentStatusModal" tabindex="-1" role="dialog" aria-labelledby="paymentStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="paymentStatusForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Payment Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="payment_status" class="form-label">Status</label>
                        <select name="status" id="payment_status" class="form-select" required onchange="toggleCustomerField()">
                            <option value="paid">Paid</option>
                            <option value="credit">Credit</option>
                        </select>
                    </div>

                    <div class="mb-3" id="customerDropdownWrapper" style="display: none;">
                        <label for="payment_customer_id" class="form-label">Customer</label>
                        <select name="customer_id" id="payment_customer_id" class="form-select">
                            <option value="">Select Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="paid_amount" class="form-label">Paid Amount</label>
                        <input type="number" step="0.01" name="paid_amount" id="paid_amount" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="payment_type" class="form-label">Payment Type</label>
                        <select name="payment_type" id="payment_type" class="form-select" required>
                            <option value="cash">Cash</option>
                            <option value="online">Online</option>
                            <!-- Add more payment types as needed -->
                        </select>
                    </div>

                    <input type="hidden" id="payment_total_amount" value="0">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Payment</button>
                </div>
            </div>
        </form>
    </div>
</div>

