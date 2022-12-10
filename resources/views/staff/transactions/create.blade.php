<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Create Transaction</h5>
                <button type="button" class="close btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('staff.transactions.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col-xl-12 mb-3 form-group">
                            <label for="validationCustom01">Patient</label>
                            <select name="patient_id" class="form-control"id="patient_id" required>
                                <option selected="">Select Patient</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-12 mb-3 form-group">
                            <label for="medical_record">Medical record</label>
                            <select class="form-control" name="medical_id" id="medical_record" required>

                            </select>
                        </div>

                        <div class="col-xl-12 mb-3 form-group">
                            <label for="invoice_id">Invoice</label>
                            <select class="form-control" name="invoice_id" id="invoice_id" required>

                            </select>
                        </div>

                        <div class="col-xl-12 mb-3 form-group">
                            <label for="OR_number">OR number</label>
                            <select class="form-control" name="official_receipt_id" id="or_number" required>

                            </select>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
