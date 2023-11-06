@extends('layouts/contentNavbarLayout')

@section('title', 'Cards basic - UI elements')
<!-- CKEditor  -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('content')
<div class="row row-2">
    <div class="col-xl">
        <div class="card">
            <div class="card-body">
                <h3 class="fw-bold text-center ">Create Staff</h3>
                <form method="POST" action="{{ route('staff.store') }}"  enctype="multipart/form-data">
                    @csrf
                    @include('content.staff.form')
                    <a href="{{ url('staff') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- CKEditor  -->
<script>
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