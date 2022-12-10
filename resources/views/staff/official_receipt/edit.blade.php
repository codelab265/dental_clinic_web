<div class="modal fade" id="edit{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Edit OR</h5>
                <button type="button" class="close btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('staff.official-receipts.update', ['official_receipt' => $id]) }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col-xl-12 mb-3 form-group">
                            <label for="due_date">Amount Paid</label>
                            <input type="number" name="amount_paid" id="amount_paid" class="form-control"
                                placeholder="" aria-describedby="helpId" required
                                value="{{ $officialReceipt->amount_paid }}">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bt n-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
