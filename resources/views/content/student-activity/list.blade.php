@extends('layouts/contentNavbarLayout')

@section('title', 'Course List - UI elements')

<!-- search ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
</script>

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="fw-bold mb-0">Student Activities List</h5>
    </div>
    <div class="card-body">
        <form class="mb-3">
            <div class="row">
                <!-- search button  -->
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control border border-1" placeholder="search by title">
                        <button type="submit" class="btn" style="background-color: #009DE1; color: white">
                            <i class="bx bx-search"></i> Search
                        </button>
                    </div>
                </div>
                <!-- clear and add new button  -->
                <div class="col-md-6 text-end">
                    <a href="{{ url('student-activities') }}" class="btn btn-outline-secondary">
                        <i class="bx bx-refresh"></i> Clear
                    </a>
                    <a href="{{ url('student-activities/create') }}" class="btn" style="background-color: #009DE1; color: white">
                        <i class="bx bx-plus"></i> New
                    </a>
                </div>
            </div>
        </form>
        <div class="table-responsive text-nowrap" id="containstudentactivity">
            @include('content.student-activity.table')
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <p>Total Records: {{ $studentactivities->total() }}</p>
            {{ $studentactivities->links() }}
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            $value = $(this).val();
            // alert($value);
            $.ajax({
                type: 'get',
                url: '/student-activities/search',
                data: {
                    'search': $value
                },
                success: function(data) {
                    console.log(data);
                    $('#containstudentactivity').html(data);
                },
            });
        });
    });
</script>
@endsection
