@extends('layouts/contentNavbarLayout')

@section('title', 'Course List - UI elements')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="fw-bold mb-0">Student Activities List</h5>
    </div>
    <div class="card-body">
        <form action="{{ url('student-activities/search') }}" method="GET" class="mb-3">
            <div class="row">
                <!-- search button  -->
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="title" class="form-control" placeholder="Search by title" value="{{ request()->get('title') }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-search"></i> Search
                        </button>
                    </div>
                </div>
                <!-- clear and add new button  -->
                <div class="col-md-6 text-end">
                    {{-- @if (request()->has('title')) --}}
                    <a href="{{ url('student-activities') }}" class="btn btn-outline-secondary">
                        <i class="bx bx-refresh"></i> Clear
                    </a>
                    {{-- @endif --}}
                    <a href="{{ url('student-activities/create') }}" class="btn btn-success">
                        <i class="bx bx-plus"></i> New
                    </a>
                </div>
            </div>
        </form>
        <div class="table-responsive text-nowrap">
            @include('content.student-activity.table')
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <p>Total Records: {{ $studentactivities->total() }}</p>
            {{ $studentactivities->links() }}
        </div>
    </div>
</div>
@endsection
