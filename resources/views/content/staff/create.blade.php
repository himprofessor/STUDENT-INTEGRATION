@extends('layouts/contentNavbarLayout')

@section('title', 'Cards basic - UI elements')
<!-- CKEditor  -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')
<div class="row row-2">
    <div class="col-xl">
        <div class="card">
            <div class="card-body">
                <h3 class="fw-bold text-center ">Create Staff</h3>
                <form method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('content.staff.form')
                    <a href="{{ url('department&staff/staff') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // CKEditor
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList'
            ],
        })
        .catch(error => {
            console.log(error);
        });

    // Hide Validation text-danger
    $(document).ready(function() {
        $('input, select, textarea, p,file').on('input change', function() {
            let fieldset = $(this).closest('fieldset');
            fieldset.find('.text-danger').hide();
            $(this).removeClass('is-invalid');
        });
    });
</script>
@endsection