<style>
  .form-group {
    margin-bottom: 0.5rem;
  }
</style>

<fieldset class="form-group">
<strong>Impact data <span class="text-danger">*</span></strong>
  <!-- // Message error when haven't enter the department name(Validate department name )-->
  <input type="text" placeholder="Please enter the impact data" class="form-control @error('data') is-invalid @enderror" id="basic-default-fullname" name="data" value="{{ old('data', $impact->data ?? '') }}" />
  @error('data')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</fieldset>

<fieldset class="form-group">
    <strong>Impact Description<span class="text-danger">*</span></strong>
    <p><textarea class="form-control  @error('description') is-invalid @enderror" placeholder="Your text here" id="editor" name="description">{!! old('description', $impact->description ?? '') !!}</textarea></p>
    {{ csrf_field() }}
    @error('description')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</fieldset>

