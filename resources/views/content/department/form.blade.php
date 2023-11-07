<div class="mb-2">
  <label class="form-label" for="basic-default-fullname">Department Name</label>
  
  <!-- // Message error when haven't enter the department name-->
  <input type="text" class="form-control @error('department_name') is-invalid @enderror" id="basic-default-fullname" name="department_name" value="{{ old('department_name', $department->department_name ?? '') }}" />
  @error('department_name')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-1 col">
  <!-- Account -->
  <div class="d-flex align-items-start align-items-sm-center gap-4">
    <img src="{{ old('department_cover', $department->department_cover ?? '') ? asset('storage/' . old('department_cover', $department->department_cover ?? '')) : asset('assets/img/avatars/missing_img.png') }}" alt="department-avatar" class="d-block rounded" height="120" width="120" id="uploadedAvatar" />
    <div class="button-wrapper">
      <label for="upload" class="btn btn-primary me-2 mb-2 " tabindex="0">
        <span class="d-none d-sm-block">Upload cover department</span>
        <i class="bx bx-upload d-block d-sm-none"></i>

      </label>

      <button type="button" class="btn btn-outline-secondary account-image-reset mb-2">
        <i class="bx bx-reset d-block d-sm-none"></i>
        <span class="d-none d-sm-block">Reset</span>
      </button>

      <!-- //Use for message error when haven't choose image-->
      <input type="file" id="upload" class="account-file-input @error('department_cover') is-invalid @enderror" name="department_cover" hidden accept="image/png, image/jpeg" />
      @error('department_cover')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
</div>