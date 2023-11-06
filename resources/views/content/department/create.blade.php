@extends('layouts/contentNavbarLayout')

@section('title', 'Departments basic - UI elements')

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

<!-- //test department image -->
@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold">Department Create</h5>
</div>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('department.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('content.department.form')
                    <a href="{{ url('department&staff/department') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
