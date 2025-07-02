@extends('backend.layouts.admin.admin')

@section('title', 'order')

@section('content')
<section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('order.update',$order->id)}}"
                  method="POST" enctype="multipart/form-data" >
            @method('PUT')
            @include('backend.order.partials.form', ['header' => 'Edit order <span class="text-primary">('.($order->title).')</span>'])
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
