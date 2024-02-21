<div class="mb-3 col-md-3 border border-1">
    <div class="card-body">
        <div class="d-flex justify-content-center">
            <div id="croppie-container" class="rounded" style="width: 200px; height: 200px; border: 2px solid #ddd; overflow: hidden; display: none;"></div>
            <div class="button-wrapper">
                <label for="upload" tabindex="0">
                    <div class="img" id="img">
                        <img src="{{ old('image', $partnership->media->image ?? '') ? asset('storage/' . old('image', $partnership->media->image ?? '')) : asset('assets/img/avatars/1.png') }}" class="d-block rounded" height="100" width="100" id="uploadedAvatar" style="cursor: pointer;" />
                        <input type="file" name="image" id="upload" class="account-file-input @error('image') is-invalid @enderror" hidden accept="image/png, image/jpeg" />
                        @error('image')
                        <div class="text-danger text-center">{{ $message }}</div>
                        @enderror
                    </div>
                </label>
            </div>
        </div>
        <!-- Hidden input to store cropped image data -->
        <input type="hidden" id="cropped-image" name="cropped_image">

        <!-- Button to trigger cropping -->
        <div class="d-flex justify-content-center">
            <button type="button" id="crop-button" class="btn mt-3" style="display: none; background-color:#009DE1; color: white">Crop Image</button>
        </div>
    </div>
</div>

<div class="mb-3">
  <strong>Partnership Name <span class="text-danger">*</span></strong>
  <!-- // Message error when haven't enter the partnership name(Validate partnership name )-->
  <input type="text" placeholder="Please enter the partnership name" class="form-control @error('partnership_name') is-invalid @enderror" id="basic-default-fullname" name="partnership_name" value="{{ old('partnership_name', $partnership->partnership_name ?? '') }}" />
  @error('partnership_name')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <strong>Address<span class="text-danger">*</span></strong>
  <!-- // Message error when haven't enter the partnership name(Validate partnership name )-->
  <input type="text" placeholder="Please enter the address partnership" class="form-control @error('address') is-invalid @enderror" id="basic-default-fullname" name="address" value="{{ old('address', $partnership->address ?? '') }}" />
  @error('address')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <strong>Website<span class="text-danger">*</span></strong>
  <!-- // Message error when haven't enter the partnership name(Validate partnership name )-->
  <input type="text" placeholder="Please enter the website partnership" class="form-control @error('website') is-invalid @enderror" id="basic-default-fullname" name="website" value="{{ old('website', $partnership->website ?? '') }}" />
  @error('website')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>


