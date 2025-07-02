@extends('backend.layouts.admin.admin')

@section('title', 'Service')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('service.update', $service->slug )}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.service.partials.form', ['header' => 'Edit service <span class="text-primary">('.($service->title).')</span>'])
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
