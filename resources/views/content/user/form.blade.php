<div class="card-body">
    <div class="d-flex align-items-start align-items-sm-center gap-4">
        <img src="{{ old('image', $user->image ?? '') ? asset('storage/' . old('image', $user->image ?? '')) : asset('assets/img/avatars/1.png') }}"
            alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />

        <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input type="file" name="image" id="upload" class="account-file-input" hidden
                    accept="image/png, image/jpeg" />
            </label>
            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                <i class="bx bx-reset d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Reset</span>
            </button>

            <p class="text-muted mb-0">Allowed JPG, GIF, or PNG. Max size of 800K</p>
        </div>
    </div>
</div>

<div class="md-3">
    <label class="form-label" for="basic-default-fullname">UserName</label>
    <input type="text" class="form-control" id="basic-default-fullname" name="username"
        value="{{ old('username', $user->username ?? '') }}" />
</div>
<div class="md-3">
    <label class="form-label" for="basic-default-fullname">Email</label>
    <input type="email" class="form-control" id="basic-default-fullname" name="email"
        value="{{ old('email', $user->email ?? '') }}" />
</div>
<div class="md-3">
    <label class="form-label" for="basic-default-fullname">Password</label>
    <input type="password" class="form-control" id="basic-default-fullname" name="password"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
        required value="{{ old('password', $user->password ?? '') }}" />
</div>
{{-- <div class="md-3">
  <div class="form-group">
    <strong>Image:</strong>
    <input type="file" name="image" class="form-control" >
    <img src="{{old('image', $user->image ?? '') }}" width="300px">
</div>
</div> --}}