<div class="mb-3">
    <label class="form-label" for="basic-default-fullname">Department_name</label>
    <input type="text" class="form-control" id="basic-default-fullname" name="department_name"
        value="{{ old('department_name', $department->department_name ?? '') }}" />
</div>
<div class="mb-3">
    <label class="form-label" for="basic-default-message">Department_cover</label>
    <textarea id="basic-default-message" class="form-control" name="department_cover">{{ old('department_cover', $department->department_cover ?? '') }}</textarea>
</div>

