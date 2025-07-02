@extends('backend.layouts.admin.admin')

@section('title', 'order')

@push('styles')

<!-- DataTables -->
<link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head d-flex justify-content-between align-items-center p-4">
                    <header class="text-capitalize">Order</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route(substr(Route::currentRouteName(), 0 , strpos(Route::currentRouteName(), '.')) . '.create') }}">
                            Add
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="alternative-page-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Customer</th>
                                            <th>Table</th>
                                            <th>Items</th>
                                            <th>Payment</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Ordered At</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            @include('backend.order.partials.table', ['order' => $order, 'customers' => $customers])
                                        @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
    <script>
        function openDeleteorderModal(orderId, orderTitle) {
            // Set the order title in the modal
            document.getElementById('orderTitle').textContent = orderTitle;

            // Set the form action to the delete URL for the selected order
            document.getElementById('deleteForm').action = '{{ route('order.destroy', ':id') }}'.replace(':id', orderId);
            // Show the modal
            $('#deleteModal').modal('show');
        }


        function openViewOrderModal(orderId) {
            const url = "{{ route('order.show', ':id') }}".replace(':id', orderId);

            // Show loading state
            document.getElementById('viewOrderContent').innerHTML = '<div class="text-center text-muted">Loading...</div>';
            $('#viewOrderModal').modal('show');

            fetch(url)
                .then(res => res.text())
                .then(html => {
                    document.getElementById('viewOrderContent').innerHTML = html;
                })
                .catch(err => {
                    document.getElementById('viewOrderContent').innerHTML = '<div class="text-danger">Failed to load order.</div>';
                });
        }


        function openPaymentStatusModal(orderId, totalAmount, currentStatus, customerId, formAction, currentPaymentType) {
            const modal = new bootstrap.Modal(document.getElementById('paymentStatusModal'));

            // Set form action
            document.getElementById('paymentStatusForm').action = formAction;

            // Set total to hidden field
            document.getElementById('payment_total_amount').value = totalAmount;

            // Set dropdown value
            document.getElementById('payment_status').value = currentStatus;

            document.getElementById('payment_type').value = currentPaymentType || 'cash';

            // Pre-fill customer
            if (customerId) {
                document.getElementById('payment_customer_id').value = customerId;
            }

            // Trigger logic for customer visibility
            toggleCustomerField();

            // Set paid amount if paid
            if (currentStatus === 'paid') {
                document.getElementById('paid_amount').value = totalAmount;
            } else {
                document.getElementById('paid_amount').value = '';
            }

            modal.show();
        }

        function toggleCustomerField() {
            const status = document.getElementById('payment_status').value;
            const customerWrapper = document.getElementById('customerDropdownWrapper');
            const customerSelect = document.getElementById('payment_customer_id');
            const paidAmount = document.getElementById('paid_amount');
            const total = parseFloat(document.getElementById('payment_total_amount').value);

            if (status === 'credit') {
                customerWrapper.style.display = 'block';
                customerSelect.required = true;
                paidAmount.readOnly = false;
                paidAmount.placeholder = "Enter paid amount";
            } else {
                customerWrapper.style.display = 'none';
                customerSelect.required = false;
                paidAmount.value = total;
                paidAmount.readOnly = true;
            }
        }
    </script>

    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>

@endpush
