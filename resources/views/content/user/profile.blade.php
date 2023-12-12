@extends('layouts/contentNavbarLayout')

@section('title', 'User Card - UI elements')
<!-- crop image  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('vendor-script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-body text-center">
                    @if (Auth::user()->media->image)
                        <img src="{{ asset('storage/' . Auth::user()->media->image) }}" alt="User Image"
                            class="w-100 h-auto rounded-circle mb-4" style="max-width: 150px; border: 4px solid #3498db;">
                    @else
                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="User Image"
                            class="w-100 h-auto rounded-circle mb-4" style="max-width: 150px; border: 4px solid #3498db;">
                    @endif

                    <h3 class="mb-2">{{ $user->username ?? '' }}</h3>
                    <p class="text-muted mb-4">Email: {{ $user->email ?? '' }}</p>

                    <!-- Additional profile information (if any) -->
                    <!-- For example, you can display user bio or other details here -->

                    <div class="d-flex justify-content-center">
                        <a href="{{ url('/user/edit', $user->id) }}" class="btn btn-outline-primary">Edit Profile</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
