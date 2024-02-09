@extends('layouts/contentNavbarLayout')

@section('title', 'discipline List - UI elements')

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="fw-bold mb-0">Discipline List</h5>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <!-- create  -->
            <form action="{{ route('disciplines.store') }}" method="post" class="col-md-5" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" name="file" id="upload" class="form-control @error('file') is-invalid @enderror">
                    <button type="submit" class="btn" style="background-color: #009DE1; color:white">Add</button>
                    <a href="{{ url('disciplines-home') }}" class="btn" style="background: rgb(154, 154, 154); color:white">Cancel</a>
                </div>
                @error('file')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </form>
            <!-- search  -->
            <form class="col-md-5">
                <div class="input-group">
                    <input type="text" name="search" id="search" class="form-control border border-1" placeholder="search by file name">
                    <button type="submit" class="btn" style="background-color: #009DE1; color: white">
                        <i class="bx bx-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
        <!-- content tabe  -->
        <div class="table-responsive text-nowrap" id="containlist">
            @include('content.discipline.table')
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <p>Total Records: {{ $rules->total() }}</p>
            {{ $rules->links() }}
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
                url: '/disciplines-home/search',
                data: {
                    'search': $value
                },
                success: function(data) {
                    console.log(data);
                    $('#containlist').html(data);
                },
            });
        });
    });
</script>
@endsection