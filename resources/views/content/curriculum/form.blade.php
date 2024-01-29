<style>
  .form-group {
    margin-bottom: 0.5rem;
  }
</style>

<fieldset class="form-group">
<strong>Curriculum title <span class="text-danger">*</span></strong>
  <!-- // Message error when haven't enter the department name(Validate department name )-->
  <input type="text" placeholder="Please enter the curriculum title" class="form-control @error('title') is-invalid @enderror" id="basic-default-fullname" name="title" value="{{ old('title', $curriculum->title ?? '') }}" />
  @error('title')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</fieldset>

<fieldset class="form-group">
  <label for="description" class="form-label">
    Curriculum Image<span style="color:red; font-size: larger;">*</span>
  </label>

  <div class="custom-file mb-2">
    <input type="file" id="upload" class="account-file-input custom-file-input @error('image') is-invalid @enderror" name="image" hidden accept="image/png, image/jpeg" />
    <label for="upload" class="btn btn-outline-primary btn-block">
      <span class="d-none d-sm-block">Choose an image for the Curriculum</span>
      <i class="bx bx-upload d-block d-sm-none"></i>
    </label>
    <button type="button" class="btn btn-outline-secondary account-image-reset">
      <i class="bx bx-reset d-block d-sm-none"></i>
      <span class="d-none d-sm-block">Reset</span>
    </button>

    @error('image')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror

  </div>

  <div class="d-flex justify-content-start mb-2 bg-light">
    <img src="{{ old('image', $curriculum->media->image ?? '') ? asset('storage/' . old('image', $curriculum->media->image ?? '')) : asset('assets/img/avatars/1.png') }}" alt="slideshow-avatar" class="img-fluid" id="uploadedAvatar" />
  </div>

  <!-- Crop image section -->
  <div class="form-group" id="cropForm" style="display: none;">
    <div class="image-crop-container border rounded overflow-hidden mb-2">
      <img src="" alt="Crop Preview" id="cropPreview" class="img-fluid">
    </div>
    <button type="button" class="btn" style="background-color:#009DE1; color: white" id="cropButton">Crop Image</button>
  </div>

  <!-- Hidden input field to store cropped image data -->
  <input type="hidden" id="croppedImage" name="cropped_image" />
  <!-- Button to trigger cropping -->
  <button type="button" id="crop-button" class="btn btn-primary mt-2" style="display: none;background-color:#009DE1; color: white">Crop Image</button>
</fieldset>

<fieldset class="form-group">
    <strong>Curriculum Description<span class="text-danger">*</span></strong>
    <p><textarea class="form-control  @error('description') is-invalid @enderror" placeholder="Your text here" id="editor" name="description">{!! old('description', $curriculum->description ?? '') !!}</textarea></p>
    {{ csrf_field() }}
    @error('description')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset>
