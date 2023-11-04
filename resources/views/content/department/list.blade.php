@extends('layouts/contentNavbarLayout')

@section('title', 'Course List - UI elements')

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold">Department List</h5>
        <a href="{{ url('department&staff/department/create') }}" class="btn btn-primary ">Add New</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                @include('content.department.table')
                {{ $departments->links() }}
            </div>
        </div>
    </div>


@endsection
