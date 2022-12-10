<!-- MODAL EFFECTS -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Book Appointment</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="needs-validation" enctype="multipart/form-data" method="POST"
                action="{{ route('patients.appointment') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-xl-12 mb-3">
                            <div class="form-group">
                              <label for="service_id">Service</label>
                              <select class="form-control" name="service_id" id="service_id" required>
                                <option value="">Select service</option>
                                @foreach ($services as $service)
                                <option value="{{ $service->id }}">
                                    {{ $service->name }}
                                </option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-xl-12 mb-3">
                            <label for="validationCustom02">Description</label>
                            <input type="text" name="description" class="form-control" id="validationCustom02"
                                placeholder="" required>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="DOW">Day of the week</label>
                      <select class="form-control" id="DOW">
                        <option value="">Select day</option>
                        <option value="1">Monday</option>
                        <option value="2">Tuesday</option>
                        <option value="3">Wednesday</option>
                        <option value="4">Thursday</option>
                        <option value="5">Friday</option>
                      </select>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Time</label>
                            <hr style="margin-top: 1px">
                            <div id="schedule_time">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
    </form>
</div>
