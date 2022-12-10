@extends('layout.app')
@section('title', 'Official Receipts')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">

                    <div class="col-lg-12">
                        <a class="modal-effect btn btn-secondary-light float-end" data-bs-effect="effect-rotate-left"
                            data-bs-toggle="modal" title="Tooltip on left" href="#add">
                            <i class="fe fe-plus-circle me-2"></i>
                            Create OR
                        </a>
                        @include('staff.official_receipt.create')
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    @if (Auth()->user()->role != 4)
                                        <th class="border-bottom-0">Patient</th>
                                    @endif
                                    <th class="border-bottom-0">Invoice Number</th>
                                    <th class="border-bottom-0">Number of ORs</th>
                                    <th class="border-bottom-0">Amount Paid</th>
                                    <th class="border-bottom-0">Balance</th>
                                    <th class="border-bottom-0">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 'officialReceipts';
                                @endphp
                                @foreach ($invoices as $invoice)
                                    @php
                                        $id = $invoice->id;
                                        
                                    @endphp
                                    <tr>
                                        @if (Auth()->user()->role != 4)
                                            <td>{{ $invoice->patient->name }}</td>
                                        @endif
                                        <td>{{ $invoice->invoice_number }}</td>
                                        <td>{{ $invoice->official_receipt->count() }}</td>

                                        <td>₱{{ number_format($invoice->official_receipt->sum('amount_paid'), 2) }}
                                        </td>
                                        <td>₱{{ number_format($invoice->invoice_detail->sum('amount') - $invoice->official_receipt->sum('amount_paid'), 2) }}
                                        </td>

                                        <td>
                                            <div class="btn-group">

                                                <div class="btn-group">

                                                    @if (Auth()->user()->role == 4)
                                                        <a name="" id="" class="btn btn-info btn-sm"
                                                            href="{{ route('patients.official-receipts.view', $id) }}"
                                                            role="button">
                                                            <i class="fa fa-eye"></i>
                                                            View ORs

                                                        </a>
                                                    @elseif (Auth()->user()->role == 3)
                                                        <a name="" id="" class="btn btn-info btn-sm"
                                                            href="{{ route('staff.official-receipts.view', $id) }}"
                                                            role="button">
                                                            <i class="fa fa-eye"></i>
                                                            View ORs

                                                        </a>
                                                    @else
                                                    @endif

                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @include('delete')
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
