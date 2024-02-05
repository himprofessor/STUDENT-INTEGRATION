<div class="mb-3 py-3 px-3 col-md">
    <div id="preview-container" class="d-flex gap-3" style="overflow-x: scroll; white-space: nowrap;">
        @foreach ($internships->media as $mediaID)
        <img src="{{ asset('storage/' . $mediaID->image) }}" class="d-block rounded" height="100" width="100">
        @endforeach
    </div>
</div>
<div class="mb-3">
    <strong>Upload Multiple Photos <span class="text-danger">*</span></strong>
    <div class="button-wrapper">
        <label for="upload" id="basic-default-image" class="btn border border-1 w-100" tabindex="0">
            <span class="d-none d-sm-block text-start">Upload Muiltiple Images</span>
            <i class="bx bx-upload d-block d-sm-none"></i>
        </label>
        <input type="file" class="form-control  @error('image') is-invalid @enderror" id="upload" name="image[]" multiple onchange="previewImages(event)" hidden />
        @error('image')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="mb-3">
    <strong>Internship Title <span class="text-danger">*</span></strong>
    <input type="text" placeholder="input title" class="form-control @error('internship_title') is-invalid @enderror" id="basic-default-title" name="internship_title" value="{{ old('internship_title', $internships->internship_title?? '') }}" />
    @error('internship_title')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <strong>Internship Description <span class="text-danger">*</span></strong>
    <p><textarea class="form-control @error('internship_description') is-invalid @enderror" placeholder="Your description here" id="editor" name="internship_description">{!! old('internship_description', $internships->internship_description?? '') !!}</textarea></p>
    {{ csrf_field() }}
    @error('internship_description')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>