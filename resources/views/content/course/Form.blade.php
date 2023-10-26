<div class="mb-3">
    <label class="form-label" for="basic-default-fullname">Title</label>
    <input type="text" class="form-control" id="basic-default-fullname" name="title"
        value="{{ old('title', $course->title ?? '') }}" />
</div>
<div class="mb-3">
    <label class="form-label" for="basic-default-message">Description</label>
    <textarea id="basic-default-message" class="form-control" name="description">{{ old('description', $course->description ?? '') }}</textarea>
</div>
