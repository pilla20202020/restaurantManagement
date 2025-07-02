@csrf
<div class="row">
    <div class="col-sm-9">
        <div class="card">
            <div class="card-underline">
                <div class="card-head p-4">
                    <header>{!! $header !!}</header>
                </div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="title" class="form-control" required
                                       value="{{ old('title', isset($service->title) ? $service->title : '') }}"/>

                                <span id="textarea1-error" class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Icon">Icon (Get Icon from <a href="//fontawesome.com/v5/search" target="_blank">here</a>)</label>
                                <input type="text" name="icon" class="form-control"
                                       value="{{ old('icon', isset($service->icon) ? $service->icon : '') }}"/>

                                <span id="textarea1-error" class="text-danger">{{ $errors->first('icon') }}</span>

                            </div>
                        </div>


                    </div>

                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="specialization">Short Description</label>
                                <textarea type="text" name="meta_description" class="form-control">{{old('meta_description',isset($service->meta_description)?$service->meta_description : '')}}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">

                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <strong>Description</strong>
                                <textarea id="elm1" name="content">{{old('content',isset($service->content)?$service->content : '')}}</textarea>

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
                    <div class="row ">
                        <div class="col-sm-12">
                            <label class="text-default-light">Image</label>
                            @if(isset($service) && $service->image)
                                <input type="file" name="image" class="dropify" id="input-file-events"
                                    data-default-file="{{ asset(str_replace('\\', '/', $service->image)) }}"/>
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
                                <input type="checkbox" id="switch1" switch="none" name="is_published"
                                       {{ old('is_published', isset($service->is_published) && $service->is_published == '1' ? 'checked' : '') }}
                                       data-switchery/>
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                            </div>
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
</div>
@push('scripts')
    <!-- tinymce js -->
<script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>

<!-- init js -->
<script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>

@endpush
