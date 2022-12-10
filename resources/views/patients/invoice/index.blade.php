@extends('layout.app')
@section('title', 'Invoices')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Invoice number</th>
                                    <th>OR Numbers</th>
                                    <th class="border-bottom-0">Patient</th>
                                    <th class="border-bottom-0">Total</th>
                                    <th class="border-bottom-0">Due Date</th>
                                    <th class="border-bottom-0">Status</th>
                                    <th class="border-bottom-0">Invoice</th>

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
                                        <td>
                                            @foreach ($invoice->official_receipt as $official_receipt)
                                                <a class="badge badge-info"
                                                    href="{{ route('patients.official-receipts.show', ['official_receipt' => $official_receipt->id]) }}">
                                                    {{ $official_receipt->OR_number }}
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>{{ $invoice->patient->name }}</td>
                                        <td>₱{{ number_format($invoice->invoice_detail->sum('amount'), 1) }}</td>
                                        <td>{{ date('d-F-Y', strtotime($invoice->due_date)) }}</td>
                                        <td>
                                            @if ($invoice->status == 0)
                                                <span class="text-danger">
                                                    Not paid
                                                </span>
                                            @elseif ($invoice->status == 1)
                                                <span class="text-warning">
                                                    Not fully paid
                                                </span>
                                            @else
                                                <span class="text-success">
                                                    paid
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a name="" id="" class="btn btn-primary"
                                                href="{{ route('patients.invoices.show', $invoice->id) }}" role="button">
                                                <i class="fa fa-eye"></i>
                                                View
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
