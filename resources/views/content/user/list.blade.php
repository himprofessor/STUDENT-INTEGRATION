@extends('layouts/contentNavbarLayout')

@section('title', 'User List - UI elements')

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="fw-bold mb-0">User List</h5>
    </div>
    <div class="card-body">
        <form class="mb-3">
            <div class="row">
                <!-- search button -->
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control border border-1" placeholder="search by user name and email">
                        <button type="submit" class="btn" style="background-color: #009DE1; color: white">
                            <i class="bx bx-search"></i> Search
                        </button>
                    </div>
                </div>
                <!-- clear and add button  -->
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <a href="{{ url('user') }}" class="btn btn-outline-secondary">
                        <i class="bx bx-refresh"></i> Clear
                    </a>
                    <a href="{{ url('user/create') }}" class="btn" style="background-color:#009DE1; color: white">
                        <i class="bx bx-plus"></i> New
                    </a>
                </div>
            </div>
        </form>
        <div class="table-responsive text-nowrap" id="contain">
            @include('content.user.table')
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <p>Total Records: {{ $users->total() }}</p>
            {{ $users->links() }}
        </div>
    </div>
</div>
<!-- search ajax  -->
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            $value = $(this).val();
            // alert($value);
            $.ajax({
                type: 'get',
                url: '/user/search',
                data: {
                    'search': $value
                },
                success: function(data) {
                    console.log(data);
                    $('#contain').html(data);
                },
            });
        });
    });
</script>
@endsection