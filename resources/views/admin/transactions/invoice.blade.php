<div class="modal fade" id="invoice{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Invoice Details</h5>
                <button type="button" class="close btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('staff.transactions.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">INVOICE NUMBER</div>
                            <div class="col-md-8">
                                {{ $transaction->invoice->invoice_number }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">DUE DATE</div>
                            <div class="col-md-8">
                                {{ $transaction->invoice->due_date }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">TOTAL PRICE</div>
                            <div class="col-md-8">
                                {{ number_format($transaction->invoice->invoice_detail->sum('amount'), 2) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">AMOUNT PAID</div>
                            <div class="col-md-8">
                                {{ number_format($transaction->invoice->amount_paid, 2) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">BALANCE</div>
                            <div class="col-md-8">
                                {{ number_format($transaction->invoice->balance, 2) }}
                            </div>
                        </div>

                        <div class="" style="margin-top: 20px">

                            <span>SERVICES</span>
                            <hr style="margin: 0px">
                            @foreach ($transaction->invoice->invoice_detail as $invoice_detail)
                                <div class="row">
                                    <div class="col-md-4">
                                        {{ $invoice_detail->service->name }}
                                    </div>
                                    <div class="col-md-4">
                                        {{ $invoice_detail->amount }}
                                    </div>
                                    <div class="col-md-4">
                                        {{ $invoice_detail->quantity }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
