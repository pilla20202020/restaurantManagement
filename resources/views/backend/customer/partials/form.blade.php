@csrf
<div class="row">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-underline">
                <div class="card-head p-4">
                    <header>{!! $header !!}</header>
                </div>
                <div class="card-body">


                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="name" class="form-control" required
                                       value="{{ old('name', isset($customer->name) ? $customer->name : '') }}"/>

                                <span id="textarea1-error" class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <div class="form-group">
                                <label for="Name">Email</label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ old('email', isset($customer->email) ? $customer->email : '') }}"/>

                                <span id="textarea1-error" class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <div class="form-group">
                                <label for="Name">Phone</label>
                                <input type="phone" name="phone" class="form-control"
                                       value="{{ old('phone', isset($customer->phone) ? $customer->phone : '') }}"/>

                                <span id="textarea1-error" class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-underline">
                <div class="card-body">
                    {{-- <div class="row ">
                        <div class="col-sm-12">
                            <label class="text-default-light">Image</label>
                            @if(isset($customer) && $customer->image)
                                <input type="file" name="image" class="dropify" id="input-file-events"
                                    data-default-file="{{ asset(str_replace('\\', '/', $customer->image)) }}"/>
                            @else
                                <input type="file" name="image" class="dropify"/>
                            @endif
                            <input type="hidden" name="removeimage" id="removeimage" value=""/>
                            <span id="textarea1-error" class="text-danger">{{ $errors->first('image') }}</span>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <span>Published</span>
                            <div class="pt-2">
                                <input type="checkbox" id="switch1" switch="none" name="is_featured"
                                       {{ old('is_featured', isset($customer->is_featured) && $customer->is_featured == '1' ? 'checked' : '') }}
                                       data-switchery/>
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                            </div>
                        </div>
                    </div> --}}



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
</div>
@push('scripts')
    <!-- tinymce js -->
<script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>

<!-- init js -->
<script src="{{ asset('backend/assets/js/customers/form-editor.init.js') }}"></script>

@endpush
