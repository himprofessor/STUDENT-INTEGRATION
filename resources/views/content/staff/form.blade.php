<fieldset class="form-group ">
    <strong>First Name</strong>
    <input type="text" placeholder="input first name" 
    class="form-control" id="first_name" name="first_name" 
    value="{{ old('first_name', $staff->first_name ?? '') }}" />
</fieldset><br>

<fieldset class="form-group">
    <strong>Last Name</strong>
    <input type="text" placeholder="input last name" 
    class="form-control" id="last_name" name="last_name" 
    value="{{ old('last_name', $staff->last_name ?? '') }}" />
</fieldset><br>

<fieldset class="form-group ">
    <strong>Email</strong>
    <input type="email" placeholder="input email" 
    class="form-control" id="email" name="email" 
    value="{{ old('email', $staff->email ?? '') }}" />
</fieldset><br>

<fieldset class="form-group">
    <strong>Position</strong>
    <input type="text" placeholder="input position" 
    class="form-control" id="position" name="position" 
    value="{{ old('position', $staff->position ?? '') }}" />
</fieldset><br>

<div class="d-flex">
    <img src="{{ old('profile', $staff->profile ?? '') ? asset('storage/' . old('profile', $staff->profile ?? '')) : asset('assets/img/avatars/1.png') }}"
        alt="staff-avatar" class="d-block rounded border border-sm" width="40" height="40" id="uploadedAvatar" />
    <label for="upload" class="btn d-flex justify-content-start w-100 bg-light border border-sm" tabindex="0">
        <span class="d-none d-sm-block">Upload Image</span>
        <i class="bx bx-upload d-block d-sm-none"></i>
        <input type="file" name="profile" id="upload" class="account-file-input" hidden
            accept="image/png, image/jpeg" />
    </label>
</div>
<br>

<fieldset class="form-group">
    <strong>Phone Number</strong>
    <input type="text" placeholder="input phone number" 
    class="form-control" id="phone" name="phone" 
    value="{{ old('phone', $staff->phone ?? '') }}" />
</fieldset><br>

<fieldset class="form-group">
    <strong>Start Date</strong>
    <select id="start_date" name="start_date" class="form-select">
        <option disabled selected>Select start date</option>
        <option value="monday" {{ $staff->start_date == 'monday' ? 'selected' : '' }}>Monday</option>
        <option value="tuesday" {{ $staff->start_date == 'tuesday' ? 'selected' : '' }}>Tuesday</option>
        <option value="wednesday" {{ $staff->start_date == 'wednesday' ? 'selected' : '' }}>Wednesday</option>
        <option value="thursday" {{ $staff->start_date == 'thursday' ? 'selected' : '' }}>Thursday</option>
        <option value="friday" {{ $staff->start_date == 'friday' ? 'selected' : '' }}>Friday</option>
        <option value="saturday" {{ $staff->start_date == 'saturday' ? 'selected' : '' }}>Saturday</option>
        <option value="sunday" {{ $staff->start_date == 'sunday' ? 'selected' : '' }}>Sunday</option>
    </select>
</fieldset><br>

<fieldset class="form-group">
    <strong>End Date</strong>
    <select id="end_date" name="end_date" class="form-select">
        <option disabled selected>Select end date</option>
        <option value="monday" {{ $staff->end_date == 'monday' ? 'selected' : '' }}>Monday</option>
        <option value="tuesday" {{ $staff->end_date == 'tuesday' ? 'selected' : '' }}>Tuesday</option>
        <option value="wednesday" {{ $staff->end_date == 'wednesday' ? 'selected' : '' }}>Wednesday</option>
        <option value="thursday" {{ $staff->end_date == 'thursday' ? 'selected' : '' }}>Thursday</option>
        <option value="friday" {{ $staff->end_date == 'friday' ? 'selected' : '' }}>Friday</option>
        <option value="saturday" {{ $staff->end_date == 'saturday' ? 'selected' : '' }}>Saturday</option>
        <option value="sunday" {{ $staff->end_date == 'sunday' ? 'selected' : '' }}>Sunday</option>
    </select>
</fieldset><br>

@if (isset($staff))
<fieldset class="form-group">
    <strong>Department Name</strong>
    <select id="department_id" name="department_id" class="form-select">
        @foreach ($departments as $department)
        <option value="{{ $department->id }}" {{$department->id == $staff->department_id ? 'selected':''}}>
            {{ $department->department_name }}
        </option>
        @endforeach
    </select>
</fieldset><br>
@else
<fieldset class="form-group">
    <strong>Department Name</strong>
    <select id="department_id" name="department_id" class="form-select">
        @foreach ($departments as $department)
        <option value="{{ $department->id }}" {{ $department->id? 'selected' : '' }}>
            {{ $department->department_name }}
        </option>
        @endforeach
    </select>
</fieldset><br>
@endif

<fieldset class="form-group">
    <strong>About Staff</strong>
    <p><textarea class="form-control" id="editor" name="about">{!! old('about', $staff->about ?? '') !!}</textarea></p>
    {{ csrf_field() }}
</fieldset>