<fieldset class="form-group ">
    <strong>Job Title</strong>
    <input type="text" placeholder="enter job title" 
    class="form-control" id="job_title" name="job_title" 
    value="{{ old('job_title', $careeropportunities->job_title ?? '') }}" />
</fieldset><br>

<fieldset class="form-group">
    <strong>Job Description</strong>
    <p><textarea class="form-control" id="editor" 
    name="job_description">{!! old('job_description', $careeropportunities->job_description ?? '') !!}</textarea></p>
    {{ csrf_field() }}
</fieldset><br>