<!-- Create subject form -->
<div class="form-group mb-3">
    <strong>Subject Name<span class="text-danger">*</span></strong>
    <input type="text" placeholder="input course name" class="form-control @error('subject_name') is-invalid @enderror" id="basic-default-course" name="subject_name" value="{{ old('subject_name', $subject->subject_name ?? '') }}" />
    @error('subject_name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mb-3">
    <strong>Course Name <span class="text-danger">*</span></strong>
    <select id="basic-default-course" name="course_id" class="form-select @error('course_id') is-invalid @enderror">
        <option disabled selected>Select course name</option>
        @foreach ($courses as $course)
        <option value="{{ $course->id }}" {{$course->id == $subjects->course_id ? 'selected':''}}>
            {{ $course->course_name }}
        </option>
        @endforeach
    </select>
    @error('course_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


