@extends('layouts/contentNavbarLayout')

@section('title', 'Course List - UI elements')

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">List of career opportunities</h3>
    <a href="{{ url('career-opportunities/create') }}" class="btn btn-primary">Add New</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            @include('content.career-opportunity.table')
        </div>
    </div>
</div>
@endsection