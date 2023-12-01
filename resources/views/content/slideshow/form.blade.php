<fieldset class="form-group mb-1">
    <strong>Heading <span style="color:red; font-size: larger;">*</span></strong>
    <input type="text" placeholder="Please enter heading" class="form-control @error('heading') is-invalid @enderror" id="basic-default-fullname" name="heading" value="{{ old('heading', $slideshow->heading ?? '') }}" />

    @error('heading')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</fieldset>

<fieldset class="form-group">
    <legend class="font-weight-bold mb-2">Slideshow<span style="color: red; font-size: larger;">*</span></legend>

    <div class="custom-file mb-3">
        <label for="upload" class="btn btn-outline-primary btn-block">
            <span class="d-none d-sm-block">Choose an image for the slideshow</span>
            <i class="bx bx-upload d-block d-sm-none"></i>
        </label>
        <button type="button" class="btn btn-outline-secondary account-image-reset mb-1">
            <i class="bx bx-reset d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Reset</span>
        </button>
        <input type="file" id="upload" 
        class="account-file-input custom-file-input @error('image') is-invalid @enderror" name="image" hidden accept="image/png, image/jpeg" />

        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-center align-items-center mb-4">
        <div class="image-crop-container border rounded overflow-hidden ">
            <img src="{{ old('image', $slideshow->media->image ?? '') ? asset('storage/' . old('image', $slideshow->media->image ?? '')) : asset('assets/img/avatars/1.png') }}" alt="slideshow-avatar" class="img-fluid" id="uploadedAvatar" />
        </div>
    </div>

    <!-- Crop image section -->
    <div class="form-group mb-4" id="cropForm" style="display: none;">
        <legend class="font-weight-bold">Crop Image</legend>
        <div class="image-crop-container border rounded overflow-hidden mb-3">
            <img src="" alt="Crop Preview" id="cropPreview" class="img-fluid">
        </div>
        <button type="button" class="btn btn-primary" id="cropButton">Crop Image</button>
    </div>


    <!-- Hidden input field to store cropped image data -->
    <input type="hidden" id="croppedImage" name="cropped_image" />
    <!-- Button to trigger cropping -->
    <button type="button" id="crop-button" class="btn btn-primary mt-3" style="display: none;">Crop Image</button>
    
</fieldset>

<fieldset class="form-group">
    <strong>Descriptions <span style="color:red; font-size: larger;">*</span></strong>
    <textarea class="form-control" placeholder="Your text here" id="editor" name="description">{!! old('description', $slideshow->description ?? '') !!}</textarea>
    {{ csrf_field() }}
</fieldset><br>