@extends('layouts/contentNavbarLayout')

@section('title', 'term List - UI elements')

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="fw-bold mb-0">term List</h5>
    </div>
    <div class="card-body">
      <div class="table-responsive text-nowrap" id="containterm">
        @include('content.term.table')
      </div>
      <div class="d-flex justify-content-between align-items-center mt-3">
        <p>Total Records: {{ $terms->total() }}</p>
        {{ $terms->links() }}
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
                url: '/term&subject/term/search',
                data: {
                    'search': $value
                },
                success: function(data) {
                    console.log(data);
                    $('#containterm').html(data);
                },
            });
        });
    });
</script>
@endsection
