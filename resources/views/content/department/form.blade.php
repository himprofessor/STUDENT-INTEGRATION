<div class="mb-3">
  <strong>Department Name <span class="text-danger">*</span></strong>
  <!-- // Message error when haven't enter the department name(Validate department name )-->
  <input type="text" placeholder="Please enter the department name" class="form-control @error('department_name') is-invalid @enderror" id="basic-default-fullname" name="department_name" value="{{ old('department_name', $department->department_name ?? '') }}" />
  @error('department_name')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3 col">
  <div class="d-flex align-items-start align-items-sm-center gap-3">
    <img src="{{ old('image', $department->media->image ?? '') ? asset('storage/' . old('image', $department->media->image ?? '')) : asset('assets/img/avatars/missing_img.png') }}" alt="department-avatar" class="d-block rounded" width="120" height="120" id="uploadedAvatar" />
    <div class="button-wrapper">
      <label for="upload" class="btn me-2 mb-2" style="background-color: #009DE1; color:white" tabindex="0">
        <span class="d-none d-sm-block">Upload department cover</span>
        <i class="bx bx-upload d-block d-sm-none"></i>
      </label>

      <button type="button" class="btn btn-outline-secondary account-image-reset mb-2">
        <i class="bx bx-reset d-block d-sm-none"></i>
        <span class="d-none d-sm-block">Reset</span>
      </button>

      <!-- //Use for message error when haven't choose image (Validate department image)-->
      <input type="file" id="upload" class="account-file-input @error('image') is-invalid @enderror" name="image" hidden accept="image/png, image/jpeg" />
      @error('image')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>
</div>
<div class="mb-3">
    <strong>Department Description<span class="text-danger">*</span></strong>
    <p><textarea class="form-control  @error('description') is-invalid @enderror" placeholder="Your text here" id="editor" name="description">{!! old('description', $department->description ?? '') !!}</textarea></p>
    {{ csrf_field() }}
    @error('description')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
