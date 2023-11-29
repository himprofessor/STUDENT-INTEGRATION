<div class="mb-3 py-3 px-3 col-md">
    <div id="preview-container" class="d-flex gap-3"></div>
</div>
<div class="mb-3">
    <strong>Title</strong>
    <input type="text" placeholder="input title" class="form-control" id="basic-default-title" name="title" value="{{ old('title', $studentactivities->title?? '') }}" />
</div>
<div class="mb-3">
    <strong>Upload Multiple Photos</strong>
    <input type="file" class="form-control" id="image" name="image[]" multiple onchange="previewImages(event)" />
</div>
<div class="mb-3">
    <strong>User Name</strong>
    <select id="basic-default-user" name="user_id" class="form-select">
        <option disabled selected>Select user name</option>
        @foreach ($users as $user)
        <option value="{{ $user->id }}" {{$user->id == $studentactivities->user_id ? 'selected':''}}>
            {{ $user->username }}
        </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <strong>Description</strong>
    <p><textarea class="form-control" placeholder="Your description here" id="editor" name="description">{!! old('description', $studentactivities->description?? '') !!}</textarea></p>
    {{ csrf_field() }}
</div>