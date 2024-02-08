<div class="modal fade" id="confirmEdit{{ $rule->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmEditLabel">Confirm Edit Rule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ url('/disciplines-home/edit/'. $rule->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Hidden input for discipline -->
                    <input type="hidden" name="id" value="{{ $rule->id }}">
                    <!-- Hidden input for current file value -->
                    <input type="hidden" name="file" value="{{ $rule->file }}">
                    
                    <!-- Form fields -->
                    <span class="form-control border border-1" id="file-name">{{ $rule->original_name_file }}</span>
                    <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror border border-1">
                    
                    <!-- update and cancel button  -->
                    <button type="submit" class="btn" style="background-color: #009DE1; color:white">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('file').addEventListener('change', function(e) {
        var fileName = e.target.files[0].name;
        var fileType = e.target.files[0].type;
        
        if (fileType !== 'application/pdf') {
            alert('Only PDF files are allowed.');
            document.getElementById('file').value = ''; // Clear the file input
        } else {
            document.getElementById('file-name').innerText = fileName;
        }
    });
</script>