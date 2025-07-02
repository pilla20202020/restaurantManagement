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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-default-light">Table</label>
                                <select name="table_id" class="form-control" id="table_id" required>
                                        <option value="" selected disabled>Select Table</option>
                                        @foreach($tables as $table)
                                            <option value="{{$table->id}}" @if(isset($table_search)) @if($table_search == $table->id) selected @endif @endif>{{$table->name}}</option>
                                        @endforeach
                                </select>
                                <span id="textarea1-error" class="text-danger">{{ $errors->first('table_id') }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-default-light">Food Menu</label>
                                <select name="table_id" class="form-control" id="table_id" required>
                                        <option value="" selected disabled>Select Food Menu</option>
                                        @foreach($foodmenus as $foodmenu)
                                            <option value="{{$foodmenu->id}}" @if(isset($foodmenu_search)) @if($foodmenu_search == $foodmenu->id) selected @endif @endif>{{$foodmenu->name}}</option>
                                        @endforeach
                                </select>
                                <span id="textarea1-error" class="text-danger">{{ $errors->first('foodmenu_id') }}</span>
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

                    <div class="row mt-3">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <span>Published</span>
                            <div class="pt-2">
                                <input type="checkbox" id="switch1" switch="none" name="is_featured"
                                       {{ old('is_featured', isset($order->is_featured) && $order->is_featured == '1' ? 'checked' : '') }}
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
<script src="{{ asset('backend/assets/js/orders/form-editor.init.js') }}"></script>

@endpush
