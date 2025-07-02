@extends('backend.layouts.admin.admin')

@section('email', 'Profile')

@section('content')
    <section>
        <div class="section-body">
            {{--            {{dd(Route::currentRouteName())}}--}}
            <form action="{{ route(Str::before(Route::currentRouteName(), '.') . '.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="form form-validate"
                role="form"
                >
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-underline">
                                <div class="card-head p-4">
                                    <header>Profile</header>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Name">Name</label>
                                                <input type="text" name="name" class="form-control" required
                                                       value="{{ old('name', isset($profile->name) ? $profile->name : '') }}"/>

                                                <span id="textarea1-error" class="text-danger">{{ $errors->first('name') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="Name">Email</label>
                                                <input type="text" name="email" class="form-control" required
                                                       value="{{ old('email', isset($profile->email) ? $profile->email : '') }}"/>

                                                <span id="textarea1-error" class="text-danger">{{ $errors->first('email') }}</span>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="old_password">Old Password</label>
                                                <input type="password" name="old_password" class="form-control" />
                                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="password">New Password</label>
                                                <input type="password" name="password" class="form-control" />
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

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
                </div>
            </form>
        </div>
    </section>
@stop


@push('styles')
    <link href="{{ asset('backend/assets/css/dropify/dropify.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('backend/assets/js/dropify/dropify.min.js') }}"></script>
@endpush
