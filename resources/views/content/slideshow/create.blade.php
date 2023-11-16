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

<!-- Link javascript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')
<div class="row row-2">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="fw-bold text-center ">Create Slideshow</h3>

                <form method="POST" action="{{ route('slideshow.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('content.slideshow.form')
                    <a href="{{ url('slideshow') }}" class="btn btn-secondary me-1">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    // CK Editor---
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
</script>
@endsection

<!-- Javascript Validate slideshow -->
<script>
$(document).ready(function() {
  $('#basic-default-fullname, #upload').on('input change', function() {
    $('#heading-error').hide();
    $(this).removeClass('is-invalid');
  });
});

</script>

