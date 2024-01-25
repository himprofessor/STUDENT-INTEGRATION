<!-- Create course form -->
<div class="form-group mb-3">
    <strong>Coruse Name<span class="text-danger">*</span></strong>
    <input type="text" placeholder="input course name" class="form-control @error('course_name') is-invalid @enderror" id="basic-default-course" name="course_name" value="{{ old('course_name', $course->course_name ?? '') }}" />
    @error('course_name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<fieldset class="form-group">
    <strong>Coruse Description<span class="text-danger">*</span></strong>
    <p><textarea class="form-control  @error('course_description') is-invalid @enderror" placeholder="Course description here" id="editor" name="course_description">{!! old('course_description', $course->course_description ?? '') !!}</textarea></p>
    {{ csrf_field() }}
    @error('course_description')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset>