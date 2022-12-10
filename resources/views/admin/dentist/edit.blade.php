<!-- MODAL EFFECTS -->
<div class="modal fade" id="edit{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Add Dentist</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="needs-validation" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.dentist.update', $id) }}">
                @csrf
                @method('patch')
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-xl-12 mb-3 form-group">
                            <label for="validationCustom01">Name</label>
                            <input type="text" name="name" class="form-control" id="validationCustom01"
                                value="{{ $user->name }}" required>
                            <div class="valid-feedback">Looks good!</div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-xl-6 mb-3">
                            <label for="validationCustom03">Contact No.</label>
                            <input type="number" name="contact_number" class="form-control" id="validationCustom03"
                                value="{{ $user->contact_number }}" required>

                        </div>
                        <div class="col-xl-6 mb-3">
                            <label for="validationCustom03">Address</label>
                            <input type="text" name="address" class="form-control" id="validationCustom03"
                                value="{{ $user->address }}" required>
                            <div class="invalid-feedback">Please provide a valid address.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="specialization">Specialization</label>
                                <input type="text" name="specialization" id="specialization" class="form-control"
                                    placeholder="Specialization" aria-describedby="helpId"
                                    value="{{ $user->specialization }}" required>
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
