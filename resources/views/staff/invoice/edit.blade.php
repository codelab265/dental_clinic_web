<div class="modal fade" id="edit{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Update Invoice</h5>
                <button type="button" class="close btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('staff.invoices.update', ['invoice' => $id]) }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="col-xl-12 mb-3 form-group">
                            <label for="due_date">Due date</label>
                            <input type="date" name="due_date" id="due_date" class="form-control" placeholder=""
                                aria-describedby="helpId" value="{{ $invoice->due_date }}" required>

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
