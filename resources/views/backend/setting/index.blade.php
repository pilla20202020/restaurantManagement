@extends('backend.layouts.admin.admin')

@section('title', 'Slider')

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
        <form action="{{ route('setting.update') }}" method="POST" class="form form-validate" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-head d-flex justify-content-between align-items-center p-3">
                            <header>General Settings</header>
                            <input type="submit" class="btn btn-primary ms-auto" value="Save All">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-head">
                                        <header class="p-3">General Information</header>
                                    </div>
                                    <div class="card-body tab-content">
                                        <div class="tab-pane active" id="first2">
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[nursing_home]">About Nursing Home</label>
                                                <textarea name="setting[nursing_home]" class="form-control" rows="2" >{{ old('setting.nursing_home', setting('nursing_home')) }}</textarea>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-head">
                                        <header class="p-3">Page Counter</header>
                                    </div>
                                    <div class="card-body tab-content">
                                        <div class="tab-pane active" id="first2">
                                            <div class="tab-pane active" id="first2">
                                                <div class="form-group">
                                                    <label class="pt-3" for="setting[patients_served]">Patients Served</label>
                                                    <input type="text" name="setting[patients_served]" class="form-control"  value="{{ old('setting.patients_served', setting('patients_served')) }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pt-3" for="setting[nurses]">Certified Nurses</label>
                                                    <input type="text" name="setting[nurses]" class="form-control" value="{{ old('setting.nurses', setting('nurses')) }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pt-3" for="setting[recoveries]">Successful Recoveries</label>
                                                    <input type="text" name="setting[recoveries]" class="form-control" value="{{ old('setting.recoveries', setting('recoveries')) }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="pt-3" for="setting[experience]">Years of Experience</label>
                                                    <input type="text" name="setting[experience]" class="form-control" value="{{ old('setting.experience', setting('experience')) }}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-head">
                                        <header class="p-3">Contacts</header>
                                    </div>
                                    <div class="card-body tab-content">
                                        <div class="tab-pane active" id="first3">
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[phone]">Phone</label>
                                                <input type="text" name="setting[phone]" class="form-control"  value="{{ old('setting.phone', setting('phone')) }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[email]">Email</label>
                                                <input type="email" name="setting[email]" class="form-control"  value="{{ old('setting.email', setting('email')) }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[domain]">Domain</label>
                                                <input type="text" name="setting[domain]" class="form-control"  value="{{ old('setting.domain', setting('domain')) }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[address]">Address</label>
                                                <input type="text" name="setting[address]" class="form-control"  value="{{ old('setting.address', setting('address')) }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="pt-3" for="setting[maps]">Maps IFrame</label>
                                                <input type="text" name="setting[maps]" class="form-control"  value="{{ old('setting.maps', setting('maps')) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-head">
                                        <header class="p-3">Social Links</header>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="pt-3" for="setting[facebook]">Facebook</label>
                                            <input type="text" name="setting[facebook]" class="form-control"  value="{{ old('setting.facebook', setting('facebook')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="pt-3" for="setting[twitter]">Twitter</label>
                                            <input type="text" name="setting[twitter]" class="form-control"  value="{{ old('setting.twitter', setting('twitter')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="pt-3" for="setting[youtube]">Youtube</label>
                                            <input type="text" name="setting[youtube]" class="form-control"  value="{{ old('setting.youtube', setting('youtube')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="pt-3" for="setting[instagram]">Instagram</label>
                                            <input type="text" name="setting[instagram]" class="form-control"  value="{{ old('setting.instagram', setting('instagram')) }}">
                                        </div>

                                        <div class="form-group">
                                            <label class="pt-3" for="setting[video_link]">Embed Video Links</label>
                                            <input type="text" name="setting[video_link]" class="form-control"  value="{{ old('setting.video_link', setting('video_link')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    @stop

@push('scripts')

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
