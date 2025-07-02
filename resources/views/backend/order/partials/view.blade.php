<div class="card shadow-sm">
    <div class="card-header bg-light">
        <h5 class="mb-0">Order #{{ $order->id }}</h5>
    </div>
    <div class="card-body">
        <div class="mb-3 row">
            <div class="col-md-6">
                <strong>Customer:</strong> {{ $order->customer->name ?? 'N/A' }}
            </div>
            <div class="col-md-6">
                <strong>Table:</strong> {{ $order->table->name ?? 'N/A' }}
            </div>
        </div>
        <div class="mb-3 row">

            <div class="col-md-6 mb-3">
                <strong>Status:</strong>
                @if($order->status == 'paid')
                    <span class="badge rounded-pill bg-success p-2">Paid</span>
                @elseif($order->status == 'unpaid')
                    <span class="badge rounded-pill bg-warning text-dark p-2">Unpaid</span>
                @elseif($order->status == 'credit')
                    <span class="badge rounded-pill bg-danger p-2">Credit</span>
                @else
                    <span class="badge rounded-pill bg-secondary">Unknown</span>
                @endif
            </div>

            <div class="col-md-6">
                @if($order->status != 'unpaid')
                    <strong>Total Paid Amount:</strong>Rs {{ $order->paid_amount ?? 'N/A' }}
                @endif
            </div>
        </div>

        <hr>

        <div class="mb-3">
            <h6 class="mb-2">Order Items</h6>
            <table class="table table-sm table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Item</th>
                        <th class="text-end">Rate</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->details as $detail)
                        <tr>
                            <td>{{ $detail->foodMenu->name ?? 'N/A' }}</td>
                            <td class="text-end">{{ number_format($detail->rate, 2) }}</td>
                            <td class="text-center">{{ $detail->quantity }}</td>
                            <td class="text-end"><strong>{{ number_format($detail->amount, 2) }}</strong></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <hr>

        <div class="d-flex justify-content-between align-items-center">
            <div>
                <strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i') }}
            </div>
            <div>
                <strong>Total:</strong>
                <span class="fs-5 text-primary">{{ number_format($order->total_amount, 2) }}</span>

                @if($order->status === 'credit')
                    @php
                        $paid = $order->paid_amount ?? 0;
                        $remaining = $order->total_amount - $paid;
                    @endphp
                    <br>
                    <small class="text-danger">Remaining: {{ number_format($remaining, 2) }}</small>
                @endif
            </div>
        </div>
    </div>
</div>
