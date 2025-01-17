<div class="mb-3 py-3 px-3 col-md">
    <div id="preview-container" class="d-flex gap-3">
        @foreach ($studentactivities->media as $mediaID)
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
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="upload" name="image[]" multiple onchange="previewImages(event)" hidden />
        @error('image')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="mb-3">
    <strong>Title <span class="text-danger">*</span></strong>
    <input type="text" placeholder="input title" class="form-control @error('title') is-invalid @enderror" id="basic-default-title" name="title" value="{{ old('title', $studentactivities->title?? '') }}" />
    @error('title')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <strong>Description</strong>
    <p><textarea class="form-control" placeholder="Your description here" id="editor" name="description">{!! old('description', $studentactivities->description?? '') !!}</textarea></p>
    {{ csrf_field() }}
</div>