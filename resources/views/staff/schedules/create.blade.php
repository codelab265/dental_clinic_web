<div class="modal fade" id="create{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ATTACH INVOICE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('staff.schedules.update', $id) }}" method="post">
                @csrf
                @method('patch')

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="invoice_id">Invoice</label>
                            <select class="form-control" name="invoice_id" id="invoice_id" required>
                                <option value="">Select invoice</option>
                                @foreach ($invoices->where('patient_id', $schedule->patient_id) as $invoice)
                                    <option value="{{ $invoice->id }}">
                                        {{ $invoice->invoice_number }}
                                    </option>
                                @endforeach

                            </select>
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
