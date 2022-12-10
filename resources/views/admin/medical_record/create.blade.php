<!-- MODAL EFFECTS -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Add Medical Record</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="needs-validation" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.medical-records.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-xl-6 mb-3 form-group">
                            <label for="validationCustom01">Dentist</label>
                            <select name="dentist_id" class="form-control" id="validationCustom01" required>
                                <option disabled="" selected="">Select Dentist. . .</option>
                                @foreach ($dentists as $dentist)
                                    <option value="{{ $dentist->id }}">
                                        {{ $dentist->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="validationCustom02">Patient</label>
                            <select name="patient_id" class="form-control" id="validationCustom01" required>
                                <option disabled="" selected="">Select Patient. . .</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">
                                        {{ $patient->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="treated_date">Treated Date</label>
                                <input type="date" name="treated_date" id="treated_date" class="form-control"
                                    placeholder="" aria-describedby="helpId" required>

                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-xl-12 mb-3">
                            <label for="validationCustom02">Diagnosis Result</label>
                            <input type="text" name="results" class="form-control" id="validationCustom02">
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="btn_diagnos" class="btn btn-primary">Save changes</button> <button
                        type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
    </form>
</div>
