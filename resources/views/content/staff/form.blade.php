<fieldset class="form-group ">
    <strong>First Name <span class="text-danger">*</span></strong>
    <input type="text" placeholder="input first name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $staff->first_name ?? '') }}" />
    @error('first_name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset><br>

<fieldset class="form-group">
    <strong>Last Name <span class="text-danger">*</span></strong>
    <input type="text" placeholder="input last name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $staff->last_name ?? '') }}" />
    @error('last_name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset><br>

<fieldset class="form-group ">
    <strong>Email <span class="text-danger">*</span></strong>
    <input type="email" placeholder="input email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $staff->email ?? '') }}" />
    @error('email')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset><br>

<fieldset class="form-group">
    <strong>Position <span class="text-danger">*</span></strong>
    <input type="text" placeholder="input position" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position', $staff->position ?? '') }}" />
    @error('position')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset><br>

<div>
    <strong>Upload Image <span class="text-danger">*</span></strong>
    <div class="d-flex">
        <img src="{{ old('profile', $staff->profile ?? '') ? asset('storage/' . old('profile', $staff->profile ?? '')) : asset('assets/img/avatars/11.png') }}" alt="staff-avatar" class="d-block rounded border border-sm" width="40" height="40" id="uploadedAvatar" />
        <label for="upload" class="btn d-flex justify-content-start w-100 bg-light border border-sm" tabindex="0">
            <span class="d-none d-sm-block">Upload Image</span>
            <i class="bx bx-upload d-block d-sm-none"></i>
            <input type="file" name="profile" id="upload" class="account-file-input @error('profile') is-invalid @enderror" hidden accept="image/png, image/jpeg" />
        </label>
    </div>
    @error('profile')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div><br>

<fieldset class="form-group">
    <strong>Phone Number <span class="text-danger">*</span></strong>
    <input type="text" placeholder="input phone number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $staff->phone ?? '') }}" />
    @error('phone')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset><br>

<fieldset class="form-group">
    <strong>Start Date <span class="text-danger">*</span></strong>
    <select id="start_date" name="start_date" class="form-select @error('start_date') is-invalid @enderror">
        <option disabled selected>Select start date</option>
        <option value="monday" {{ $staff->start_date == 'monday' ? 'selected' : '' }}>Monday</option>
        <option value="tuesday" {{ $staff->start_date == 'tuesday' ? 'selected' : '' }}>Tuesday</option>
        <option value="wednesday" {{ $staff->start_date == 'wednesday' ? 'selected' : '' }}>Wednesday</option>
        <option value="thursday" {{ $staff->start_date == 'thursday' ? 'selected' : '' }}>Thursday</option>
        <option value="friday" {{ $staff->start_date == 'friday' ? 'selected' : '' }}>Friday</option>
        <option value="saturday" {{ $staff->start_date == 'saturday' ? 'selected' : '' }}>Saturday</option>
        <option value="sunday" {{ $staff->start_date == 'sunday' ? 'selected' : '' }}>Sunday</option>
    </select>
    @error('start_date')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset><br>

<fieldset class="form-group">
    <strong>End Date <span class="text-danger">*</span></strong>
    <select id="end_date" name="end_date" class="form-select @error('end_date') is-invalid @enderror">
        <option disabled selected>Select end date</option>
        <option value="monday" {{ $staff->end_date == 'monday' ? 'selected' : '' }}>Monday</option>
        <option value="tuesday" {{ $staff->end_date == 'tuesday' ? 'selected' : '' }}>Tuesday</option>
        <option value="wednesday" {{ $staff->end_date == 'wednesday' ? 'selected' : '' }}>Wednesday</option>
        <option value="thursday" {{ $staff->end_date == 'thursday' ? 'selected' : '' }}>Thursday</option>
        <option value="friday" {{ $staff->end_date == 'friday' ? 'selected' : '' }}>Friday</option>
        <option value="saturday" {{ $staff->end_date == 'saturday' ? 'selected' : '' }}>Saturday</option>
        <option value="sunday" {{ $staff->end_date == 'sunday' ? 'selected' : '' }}>Sunday</option>
    </select>
    @error('end_date')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset><br>

<fieldset class="form-group">
    <strong>Department Name <span class="text-danger">*</span></strong>
    <select id="department_id" name="department_id" class="form-select @error('department_id') is-invalid @enderror">
        <option disabled selected>Select department name</option>
        @foreach ($departments as $department)
        <option value="{{ $department->id }}" {{$department->id == $staff->department_id ? 'selected':''}}>
            {{ $department->department_name }}
        </option>
        @endforeach
        @error('department_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </select>
</fieldset><br>

<fieldset class="form-group">
    <strong>About Staff <span class="text-danger">*</span></strong>
    <p><textarea class="form-control @error('about') is-invalid @enderror" id="editor" name="about">{!! old('about', $staff->about ?? '') !!}</textarea></p>
    {{ csrf_field() }}
    @error('about')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset><br>