@extends('layout.app')
@section('title', 'Invoices')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">

                    <div class="col-lg-12">
                        <a class="modal-effect btn btn-secondary-light float-end" data-bs-effect="effect-rotate-left"
                            data-bs-toggle="modal" title="Tooltip on left" href="#add">
                            <i class="fe fe-plus-circle me-2"></i>
                            Create Invoice
                        </a>
                        @include('staff.invoice.create')
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Invoice</th>
                                    <th class="border-bottom-0">Patient</th>
                                    <th>OR numbers</th>
                                    <th class="border-bottom-0">Total</th>
                                    <th class="border-bottom-0">Due</th>

                                    <th class="border-bottom-0">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 'invoices';
                                @endphp
                                @foreach ($invoices as $invoice)
                                    @php
                                        $id = $invoice->id;
                                    @endphp
                                    <tr>
                                        <td>{{ $invoice->invoice_number }}</td>
                                        <td>{{ $invoice->patient->name }}</td>
                                        <td>
                                            @foreach ($invoice->official_receipt as $official_receipt)
                                                <a class="badge badge-info"
                                                    href="{{ route('staff.official-receipts.show', ['official_receipt' => $official_receipt->id]) }}">
                                                    {{ $official_receipt->OR_number }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>₱{{ number_format($invoice->invoice_detail->sum('amount'), 1) }}</td>
                                        <td>{{ date('d-F-Y', strtotime($invoice->due_date)) }}</td>

                                        <td>
                                            <div class="btn-group">

                                                <div class="btn-group">
                                                    @if ($invoice->sent_status == 0)
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('staff.invoice.update', ['id' => $id]) }}">Send
                                                        </a>
                                                    @else
                                                        <a class="btn btn-success btn-sm disable" aria-readonly="true">Sent
                                                        </a>
                                                    @endif
                                                    <a name="" id="" class="btn btn-info btn-sm"
                                                        href="{{ route('staff.invoices.show', $id) }}" role="button">
                                                        <i class="fa fa-eye"></i>
                                                        View
                                                    </a>

                                                    <a name="" id="" class="btn btn-warning btn-sm"
                                                        data-bs-toggle="modal" href="#edit{{ $id }}"
                                                        role="button">
                                                        <i class="fa fa-edit"></i>
                                                        Update
                                                    </a>

                                                    <a name="" id="" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal" href="#delete{{ $id }}"
                                                        role="button">
                                                        <i class="fa fa-trash"></i>
                                                        Delete
                                                    </a>

                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @include('delete')
                                    @include('staff.invoice.edit')
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        $('.update_amount_paid').keyup(function(e) {
            var id = $(this).attr('id');
            var total = parseInt($('#update_total_amount' + id).val());
            var paid = parseInt($(this).val());
            var balance = total - paid;
            $('#update_balance' + id).val(balance);
        });
    </script>
@endpush
