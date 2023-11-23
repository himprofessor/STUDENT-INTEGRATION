<div class="card-body">
    <div class="d-flex align-items-start align-items-sm-center gap-4">
        <div id="croppie-container" class="rounded"
            style="width: 200px; height: 200px; border: 2px solid #ddd; overflow: hidden; display: none;"></div>
        <div class="img" id="img">
            <img src="{{ old('image', $user->media->image ?? '') ? asset('storage/' . old('image', $user->media->image ?? '')) : asset('assets/img/avatars/1.png') }}"
                class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
        </div>
        <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-1" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
            </label>

            <button type="button" class="btn btn-outline-secondary account-image-reset mb-1">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
            </button>
            <input type="file" name="image" id="upload" hidden accept="image/png, image/jpeg"
                class="account-file-input @error('image') is-invalid @enderror" />
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- Hidden input to store cropped image data -->
    <input type="hidden" id="cropped-image" name="cropped_image">

    <!-- Button to trigger cropping -->
    <button type="button" id="crop-button" class="btn btn-primary mt-3" style="display: none;">Crop Image</button>
</div>

<div class="md-3">
    <label class="form-label" for="basic-default-fullname">UserName</label>
    <span style="color: red">*</span>
    <input type="text" class="form-control @error('username') is-invalid @enderror" id="basic-default-fullname"
        name="username" value="{{ old('username', $user->username ?? '') }}" />
    @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="md-3">
    <label class="form-label" for="basic-default-fullname">Email</label>
    <span style="color: red">*</span>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="basic-default-fullname"
        name="email" value="{{ old('email', $user->email ?? '') }}" />
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="md-3">
    <label class="form-label" for="basic-default-fullname">Password</label>
    <span style="color: red">*</span>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="basic-default-fullname"
        name="password" value="{{ old('password', $user->password ?? '') }}" />
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
