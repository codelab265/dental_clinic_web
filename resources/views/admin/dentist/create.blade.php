<!-- MODAL EFFECTS -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Add Dentist</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="needs-validation" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.dentist.store') }}">
                @csrf
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-xl-12 mb-3 form-group">
                            <label for="validationCustom01">Name</label>
                            <input type="text" name="name" class="form-control" id="validationCustom01" required>
                            <div class="valid-feedback">Looks good!</div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-xl-6 mb-3">
                            <label for="validationCustom03">Contact No.</label>
                            <input type="number" name="contact_number" class="form-control" id="validationCustom03"
                                required>

                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="validationCustom03">Address</label>
                            <input type="text" name="address" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">Please provide a valid address.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="specialization">Specialization</label>
                                <input type="text" name="specialization" id="specialization" class="form-control"
                                    placeholder="Specialization" aria-describedby="helpId" required>

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-xl-6 mb-3">
                            <label for="validationCustom03">Email</label>
                            <input type="email" name="email" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">Please provide a valid city.</div>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="validationCustom03">Password</label>
                            <input type="password" name="password" class="form-control" id="validationCustom03"
                                required>
                            <div class="invalid-feedback">Please provide a valid city.</div>
                        </div>
                    </div>
                    <div class="button-group">
                        <a name="" id="" class="btn btn-success btn-sm" href="#" role="button"
                            data-duplicate-add="schedule">
                            <i class="fa fa-plus-circle"></i>
                        </a>
                        <a name="" id="" class="btn btn-danger btn-sm" href="#" role="button"
                            data-duplicate-remove="schedule">
                            <i class="fa fa-times-circle"></i>
                        </a>
                    </div>
                    <hr style="margin-top: 0px">
                    <div class="row" data-duplicate="schedule">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Day</label>
                                <select class="form-control" name="dow[]" id="dow" required>
                                    <option value="" disabled>Select day of the week</option>
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
                                <input type="time" name="start[]" id="start" class="form-control"
                                    placeholder="" aria-describedby="helpId" placeholder="start time" required>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="end">End time</label>
                                <input type="time" name="end[]" id="end" class="form-control"
                                    placeholder="" aria-describedby="helpId" required>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button name="btn_co_dentist" type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
    </form>
</div>`
