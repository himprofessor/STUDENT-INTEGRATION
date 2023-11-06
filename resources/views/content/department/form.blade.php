<div class="mb-3">
  
  <label class="form-label" for="basic-default-fullname">Department_name</label>
  <input type="text" class="form-control" id="basic-default-fullname" name="department_name" value="{{ old('department_name', $department->department_name ?? '') }}" />

</div>

<div class="mb-3 col">

  <!-- Account -->

  <div class="d-flex align-items-start align-items-sm-center gap-4">

    <img src="{{ old('department_cover', $department->department_cover ?? '') ? asset('storage/' . old('department_cover', $department->department_cover ?? '')) : asset('assets/img/avatars/1.png') }}" alt="department-avatar" class="d-block rounded" height="140" width="180" id="uploadedAvatar" />

    <div class="button-wrapper">
      <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
        <span class="d-none d-sm-block">Upload cover department</span>
        <i class="bx bx-upload d-block d-sm-none"></i>
        <input type="file" id="upload" class="account-file-input" name="department_cover" hidden accept="image/png, image/jpeg" />
      </label>

      <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
        <i class="bx bx-reset d-block d-sm-none"></i>
        <span class="d-none d-sm-block">Reset</span>
      </button>
      <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
    </div>
  </div>

</div>