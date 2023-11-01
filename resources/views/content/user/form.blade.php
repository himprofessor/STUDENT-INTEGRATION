<div class="md-3">
  <label class="form-label" for="basic-default-fullname">UserName</label>
  <input type="text" class="form-control" id="basic-default-fullname" name="username"
      value="{{ old('username', $user->username ?? '') }}" />
</div>
<div class="md-3">
  <label class="form-label" for="basic-default-fullname">Email</label>
  <input type="email" class="form-control" id="basic-default-fullname" name="email"
      value="{{ old('email', $user->email ?? '') }}" />
</div>
<div class="md-3">
  <label class="form-label" for="basic-default-fullname">Password</label>
  <input type="password" class="form-control" id="basic-default-fullname" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required
    value="{{ old('password', $user->password ?? '') }}" />
</div>
<div class="md-3">
  <div class="form-group">
    <strong>Image:</strong>
    <input type="file" name="image" class="form-control" >
    <img src="{{old('image', $user->image ?? '') }}" width="300px">
</div>
</div>

