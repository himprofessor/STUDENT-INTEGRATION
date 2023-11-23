<div class="mb-3 col-md-3">
    <label for="upload" class="d-flex justify-content-center border border-sm py-5" tabindex="0">
        <img src="{{ old('image', $staff->media->image ?? '') ? asset('storage/' . old('image', $staff->media->image ?? '')) : asset('assets/img/avatars/1.png') }}" alt="staff-avatar" id="uploadedAvatar" width="100" height="100" style="cursor: pointer;" />
        <input type="file" name="image" id="upload" class="account-file-input @error('image') is-invalid @enderror" hidden accept="image/png, image/jpeg" />
    </label>
    @error('image')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <strong>First Name <span class="text-danger">*</span></strong>
        <input type="text" placeholder="input first name" class="form-control @error('first_name') is-invalid @enderror" id="basic-default-firstname" name="first_name" value="{{ old('first_name', $staff->first_name ?? '') }}" />
        @error('first_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <strong>Last Name <span class="text-danger">*</span></strong>
        <input type="text" placeholder="input last name" class="form-control @error('last_name') is-invalid @enderror" id="basic-default-lastname" name="last_name" value="{{ old('last_name', $staff->last_name ?? '') }}" />
        @error('last_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <strong>Email <span class="text-danger">*</span></strong>
        <input type="email" placeholder="input email" class="form-control @error('email') is-invalid @enderror" id="basic-default-email" name="email" value="{{ old('email', $staff->email ?? '') }}" />
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <strong>Phone Number <span class="text-danger">*</span></strong>
        <input type="text" placeholder="input phone number" class="form-control @error('phone') is-invalid @enderror" id="basic-default-phone" name="phone" value="{{ old('phone', $staff->phone ?? '') }}" />
        @error('phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <strong>Position <span class="text-danger">*</span></strong>
        <input type="text" placeholder="input position" class="form-control @error('position') is-invalid @enderror" id="basic-default-position" name="position" value="{{ old('position', $staff->position ?? '') }}" />
        @error('position')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-md-6">
        <strong>Department Name <span class="text-danger">*</span></strong>
        <select id="basic-default-department" name="department_id" class="form-select @error('department_id') is-invalid @enderror">
            <option disabled selected>Select department name</option>
            @foreach ($departments as $department)
            <option value="{{ $department->id }}" {{$department->id == $staff->department_id ? 'selected':''}}>
                {{ $department->department_name }}
            </option>
            @endforeach
        </select>
        @error('department_id')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div><br>
    <div class="mb-3 col-md-6">
        <strong>Start Date <span class="text-danger">*</span></strong>
        <select id="basic-default-start" name="start_date" class="form-select @error('start_date') is-invalid @enderror">
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
    </div>
    <div class="mb-3 col-md-6">
        <strong>End Date <span class="text-danger">*</span></strong>
        <select id="basic-default-end" name="end_date" class="form-select @error('end_date') is-invalid @enderror">
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
    </div>
</div>
<fieldset class="form-group">
    <strong>About Staff <span class="text-danger">*</span></strong>
    <p><textarea class="form-control" placeholder="Your text here" id="editor" name="about">{!! old('about', $staff->about ?? '') !!}</textarea></p>
    {{ csrf_field() }}
</fieldset>