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
        <form class="mb-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control border border-1" placeholder="search by department name">
                        <button type="submit" class="btn" style="background-color: #009DE1; color:white">
                            <i class="bx bx-search"></i> Search
                        </button>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ url('department&staff/department') }}" class="btn btn-outline-secondary">
                        <i class="bx bx-refresh"></i> Clear
                    </a>
                    <a href="{{ url('department&staff/department/create') }}" class="btn" style="background-color: #009DE1; color:white">
                        <i class="bx bx-plus"></i> New
                    </a>
                </div>
            </div>
        </form>
        <div class="table-responsive text-nowrap" id="containdepartment">
            @include('content.department.table')
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <p>Total Records: {{ $departments->total() }}</p>
            {{ $departments->links() }}
        </div>
    </div>
</div>
<!-- search ajax  -->
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '/department&staff/department/search',
                data: {
                    'search': $value
                },
                success: function(data) {
                    console.log(data);
                    $('#containdepartment').html(data);
                },
            });
        });
    });
</script>
@endsection