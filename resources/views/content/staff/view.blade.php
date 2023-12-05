<div class="modal fade" id="confirmView{{ $staff->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmViewLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="confirmViewLabel">Detail Information Staff</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 text-center px-1 border-end">
                        <img src="{{ asset('storage/' . $staff->media->image) }}" class="rounded-circle" alt="Staff Image" width="100" height="100">
                        <h4 class="mt-4 text-wrap">{{$staff->first_name}} {{$staff->last_name}}</h4>
                        <p class="mb-3 text-wrap">{{$staff->position}}</p>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 text-wrap">
                                <strong>Email</strong>
                                <br>
                                {{$staff->email}}
                            </div>
                            <div class="col-md-6 text-wrap">
                                <strong>Phone</strong>
                                <br>
                                {{$staff->phone}}
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 text-wrap">
                                <strong>Department</strong>
                                <br>
                                {{$staff->department->department_name}}
                            </div>
                            <div class="col-md-6 text-wrap">
                                <strong>Working Days</strong>
                                <br>
                                {{$staff->start_date}} to {{$staff->end_date}}
                            </div>
                        </div>
                        <div class="mt-4 text-wrap">
                            <strong>About staff</strong>
                            <br>
                            {!! ($staff->about) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>