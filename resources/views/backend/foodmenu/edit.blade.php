@extends('backend.layouts.admin.admin')

@section('title', 'foodmenu')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('foodmenu.update',$foodmenu->id)}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.foodmenu.partials.form', ['header' => 'Edit foodmenu <span class="text-primary">('.($foodmenu->title).')</span>'])
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
