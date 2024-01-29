@extends('layouts/contentNavbarLayout')

@section('title', 'Cards basic - UI elements')

<!-- Hide validation  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- CKEditor  -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

@section('vendor-script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold">Course Create</h5>
</div>
<div class="row row-2">
    <div class="col-xl">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('subject.store') }}">
                    @csrf
                    @include('content.subject.form')
                    <a href="{{ url('term&subject/subject') }}" class="btn btn-secondary me-1 mt-2">Cancel</a>
                    <button type="submit" class="btn mt-2" style="background-color: #009DE1; color:white">Submit</button>
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
                'numberedList',
            ],
        })
        .catch(error => {
            console.log(error);
        });

    // Hide Validation text-danger
    $(document).ready(function() {
        $('#basic-default-course, #basic-default-term, #basic-default-subject').on('input change', function() {
            $(this).removeClass('is-invalid');
            $(this).next('.text-danger').hide();
        });
    });
</script>
@endsection