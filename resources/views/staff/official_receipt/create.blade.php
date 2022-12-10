<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Create OR</h5>
                <button type="button" class="close btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('staff.official-receipts.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col-xl-12 mb-3 form-group">
                            <label for="validationCustom01">Patient</label>
                            <select name="invoice_id" class="form-control" id="validationCustom01" required>
                                <option disabled="" selected="">Select Invoice</option>
                                @foreach ($invoices as $invoice)
                                    <option value="{{ $invoice->id }}">
                                        {{ $invoice->invoice_number }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-xl-12 mb-3 form-group">
                            <label for="due_date">Amount Paid</label>
                            <input type="number" name="amount_paid" id="amount_paid" class="form-control" placeholder=""
                                aria-describedby="helpId" required>

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
