@extends('layouts/contentNavbarLayout')

@section('title', 'Cards basic - UI elements')

<!-- Hide validation  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- CKEditor  -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold">Career Opportunity Create </h5>
</div>
<div class="row row-2">
    <div class="col-xl">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('career-opportunities.store') }}">
                    @csrf
                    @include('content.career-opportunity.form')
                    <a href="{{ url('career-opportunities') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn" style="background-color:#009DE1; color: white">Submit</button>
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
        $('input, textarea, file').on('input change', function() {
            let fieldset = $(this).closest('fieldset');
            fieldset.find('.text-danger').hide();
            $(this).removeClass('is-invalid');
        });
    });
</script>
@endsection