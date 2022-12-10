<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Schedule</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.schedule') }}" method="post">
                @csrf

                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Schedule Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="" aria-describedby="helpId">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dentist_id">Dentist</label>
                                        <select class="form-control" name="dentist_id" id="dentist_id">
                                            <option value="">select</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dentist_id">Patient</label>
                                        <select class="form-control" name="patient_id" id="patient_id">
                                            <option value="">select</option>
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}">
                                                    {{ $patient->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="schedule_date">Schedule Date</label>
                                        <input type="date" name="schedule_date" id="schedule_date"
                                            class="form-control" placeholder="" aria-describedby="helpId">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="schedule_time">Schedule Time</label>
                                        <input type="time" name="schedule_time" id="schedule_time"
                                            class="form-control" placeholder="" aria-describedby="helpId">

                                    </div>
                                </div>
                            </div>

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
