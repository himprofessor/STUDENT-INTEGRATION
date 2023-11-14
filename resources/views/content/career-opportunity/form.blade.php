<fieldset class="form-group ">
    <strong>Job Title<span class="text-danger">*</span></strong>
    <input type="text" class="form-control @error('job_title') is-invalid @enderror" placeholder="Enter job title" id="job_title" name="job_title" value="{{ old('job_title', $careeropportunities->job_title ?? '') }}" />
    @error('job_title')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset><br>

<fieldset class="form-group">
    <strong>Job Description<span class="text-danger">*</span></strong>
    <p><textarea class="form-control @error('job_description') is-invalid @enderror" placeholder="Your text here" id="editor" name="job_description">{!! old('job_description', $careeropportunities->job_description ?? '') !!}</textarea></p>
    {{ csrf_field() }}
    @error('job_description')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset>