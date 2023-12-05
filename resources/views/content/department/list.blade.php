
@extends('layouts/contentNavbarLayout')

@section('title', 'Department List - UI elements')

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="fw-bold mb-0">Department List</h5>
        </div>
        <div class="card-body">
            <form action="{{ url('department&staff/department/search') }}" method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" name="department_name" class="form-control" placeholder="Search by department name"
                                value="{{ request()->get('department_name') }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-search"></i> Search
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">

                        {{-- @if (request()->has('department_name')) --}}
                        <a href="{{ url('department&staff/department') }}" class="btn btn-outline-secondary">
                            <i class="bx bx-refresh"></i> Clear
                        </a>
                        {{-- @endif --}}
                        <a href="{{ url('department&staff/department/create') }}" class="btn btn-primary">
                            <i class="bx bx-plus"></i> New
                        </a>
                    </div>
                </div>
            </form>
            <div class="table-responsive text-nowrap">
                @include('content.department.table')
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <p>Total Records: {{ $departments->total() }}</p>
                {{ $departments->links() }}
            </div>
        </div>
    </div>
@endsection


