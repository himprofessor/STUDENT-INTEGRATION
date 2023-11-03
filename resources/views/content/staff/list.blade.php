@extends('layouts/contentNavbarLayout')

@section('title', 'Course List - UI elements')

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold">List of staff</h3>
    <a href="{{ url('staff/create') }}" class="btn btn-primary">Create</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            @include('content.staff.table')
        </div>
    </div>
</div>
@endsection