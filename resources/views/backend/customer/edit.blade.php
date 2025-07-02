@extends('backend.layouts.admin.admin')

@section('title', 'customer')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('customer.update',$customer->id)}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.customer.partials.form', ['header' => 'Edit customer <span class="text-primary">('.($customer->title).')</span>'])
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
