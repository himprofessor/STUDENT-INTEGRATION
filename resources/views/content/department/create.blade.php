@extends('layouts/contentNavbarLayout')

@section('title', 'Cards basic - UI elements')

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

<!-- //test department image -->
@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

<!-- @section('content')


<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold">Department Create</h5>
</div>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('department.store') }}">
                    @csrf
                    @include('content.department.form')
                    <a href="{{ url('department_staff/department') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection -->

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            @if (session('status'))
                <h6 class="alert success">{{session('status')}}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Student Form</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('save-student') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Upload Image</label>
                            <input type="file" name="image" required class="course form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection


@push('script')
<script>
    selectImage.onchange = evt => {
        preview = document.getElementById('preview');
        preview.style.display = 'block';
        const [file] = selectImage.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
@endpush