
<div class="modal fade" id="confirmDelete{{ $activities->id }}" tabindex="-1" role="dialog"
    aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Confirm Delete Student Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this student activity?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('student-activities.destroy', $activities->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="background-color: #E85252; color: white">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>