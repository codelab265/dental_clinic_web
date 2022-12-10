<div class="modal fade" id="status{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">STATUS</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.appointments.update', $id) }}" method="post">
                @csrf
                @method('patch')

                <input type="hidden" name="patient_id" value="{{ $appointment->patient_id }}">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="schedule_status" required>
                                <option value="">Select</option>
                                @if ($appointment->status == 0)
                                    <option value="1">Accept</option>
                                @endif
                                <option value="2">Reject</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
