<fieldset class="form-group mb-1">
    <strong>Heading <span style="color:red; font-size: larger;">*</span></strong>
    <input type="text" placeholder="Please enter heading " class="form-control @error('heading') is-invalid @enderror" id="basic-default-fullname" name="heading" value="{{ old('heading', $slideshow->heading ?? '') }}" />

    @error('heading')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</fieldset>

<fieldset class="form-group">
    <strong>Slideshow<span style="color:red; font-size: larger;">*</span></strong>

    <label for="upload" class="btn d-flex justify-content-start w-100 bg-light border border-sm" tabindex="0">
        <span class="d-none d-sm-block">Please upload image slideshow</span>
        <i class="bx bx-upload d-block d-sm-none"></i>
    </label>

    <input type="file" id="upload" class="account-file-input @error('image') is-invalid @enderror" name="image" hidden accept="image/png, image/jpeg" />

    @error('image')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    <div class="d-flex ">
        <img src="{{ old('image', $slideshow->media->image ?? '') ? asset('storage/' . old('image', $slideshow->media->image ?? '')) : asset('assets/img/avatars/1.png') }}" 
        alt="slideshow-avatar" class="d-block " width="120px" id="uploadedAvatar" />
    </div>

</fieldset>

<fieldset class="form-group ">
    <strong>Descriptions <span style="color:red; font-size: larger;">*</span></strong>
    <textarea class="form-control " id="editor" name="description">{!! old('description', $slideshow->description ?? '') !!}</textarea>
    {{ csrf_field() }}

    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror

</fieldset><br>