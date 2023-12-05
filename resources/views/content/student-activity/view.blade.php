<div class="modal fade" id="confirmView{{ $activities->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmViewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="confirmViewLabel">Student Activity</h4>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="row">
                            @foreach ($activities->media as $medium)
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $medium->image) }}" alt="student activity" class="img-thumbnail mb-2" style="width: 130px; height: 130px;">
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4 text-wrap">
                            <strong>Description</strong>
                            <br>
                            {!! $activities->description !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>