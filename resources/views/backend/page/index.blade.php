@extends('backend.layouts.admin.admin')

@section('title', 'Page')

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
                    <header class="text-capitalize">all pages</header>
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
                                            {{-- <th><input type="checkbox" id="selectAll"></th> --}}
                                            <th width="5%">S.N</th>
                                            <th width="15%">Title</th>
                                            <th width="20%">Image</th>
                                            <th width="15%">Is Published</th>
                                            <th width="15%" class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @each('backend.page.partials.table', $pages, 'page')
                                    </tbody>
                                </table>
                            </div>

                        </div> <!-- end card -->
                    </div> <!-- end col -->
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
    <script>
        function openDeleteModal(pageId, pageTitle) {
            // Set the page title in the modal
            document.getElementById('pageTitle').textContent = pageTitle;

            // Set the form action to the delete URL for the selected page
            document.getElementById('deleteForm').action = '{{ route('page.destroy', ':id') }}'.replace(':id', pageId);
            // Show the modal
            $('#deleteModal').modal('show');
        }

        $(document).ready(function () {
            // Select all checkboxes
            $('#selectAll').on('click', function () {
                $('.page-checkbox').prop('checked', this.checked);
            });

            // Bulk delete action
            $('#deleteSelected').on('click', function () {
                const selected = $('.page-checkbox:checked');

                if (selected.length > 0) {
                    // Confirm if the user wants to delete selected pages
                    if (confirm('Are you sure you want to delete the selected pages?')) {
                        // Prepare the selected page IDs to send in the form
                        const selectedIds = [];
                        selected.each(function() {
                            selectedIds.push($(this).val());
                        });

                        // Check if there are selected IDs to delete
                        if (selectedIds.length > 0) {
                            // Remove any previously added hidden inputs (if any)
                            $('#bulkDeleteForm input[name="selected_pages[]"]').remove();

                            // Add the selected page IDs as hidden inputs to the form
                            selectedIds.forEach(function(id) {
                                $('<input>').attr({
                                    type: 'hidden',
                                    name: 'selected_pages[]',
                                    value: id
                                }).appendTo('#bulkDeleteForm');
                            });

                            // Submit the form
                            $('#bulkDeleteForm').submit();
                        }
                    }
                } else {
                    alert('Please select at least one page to delete.');
                }
            });
        });

        $(document).ready(function () {
            // Initialize the DataTable
            $('#alternative-page-datatable').DataTable().destroy();
            var table = $('#alternative-page-datatable').DataTable({
                // ... any other DataTable options you already have ...
            });

            // Category filter change event
            $('#categoryFilter').on('change', function() {
                let val = $.fn.dataTable.util.escapeRegex($(this).val());

                // Here we assume Category is in the 4th column (index 3)
                // If your "Category" column is at a different index, adjust it.
                table
                    .column(3)                  // zero-based index for Category col
                    .search(val)               // simple substring match
                    .draw();
            });
        });

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

    {{-- <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script> --}}

@endpush
