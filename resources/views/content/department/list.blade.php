@extends('layouts/contentNavbarLayout')

@section('title', 'Department List - UI elements')

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

<!-- //list department image -->
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold">Department List</h5>
    <a href="{{ url('department&staff/department/create') }}" class="btn btn-primary">Add New</a>
</div>

<!-- Include the search form -->
@include('content.department.search')

<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            @include('content.department.table')
        </div>
        
        <div class="d-flex justify-content-between mt-3">
            <div class="align-self-start">Total: {{$totalDepartments}}</div>
            <div class="align-self-end">{{ $departments->links() }}</div>
        </div>
    </div>
</div>

@endsection