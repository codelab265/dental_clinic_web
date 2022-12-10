<div class="modal fade" id="edit{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Schedule</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.schedule.update', $id) }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="container-fluid">
                        
                        @foreach ($user->dentist_schedule as $dentist_schedule)  
                           <input type="hidden" name="id[]" value="{{ $dentist_schedule->id }}">
                            <div class="row" data-duplicate="schedule">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Day</label>
                                        <select class="form-control" name="dow[]" id="dow" required>
                                            <option value="{{ $dentist_schedule->dayOfWeek }}">{{ days($dentist_schedule->dayOfWeek) }}</option>
                                            <option value="1">Monday</option>
                                            <option value="2">Tuesday</option>
                                            <option value="3">Wednesday</option>
                                            <option value="4">Thursday</option>
                                            <option value="5">Friday</option>
                                            <option value="6">Saturday</option>
                                            <option value="7">Sunday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="start">Start time</label>
                                        <input type="time" name="start[]" id="start" class="form-control" value="{{ $dentist_schedule->startTime }}" required>
        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="end">End time</label>
                                        <input type="time" name="end[]" id="end" class="form-control" value="{{ $dentist_schedule->endTime }}" required>
        
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
