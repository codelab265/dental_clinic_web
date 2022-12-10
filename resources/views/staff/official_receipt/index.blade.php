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
                                    <th class="border-bottom-0">Patient</th>
                                    <th class="border-bottom-0">Invoice Number</th>
                                    <th class="border-bottom-0">OR number</th>
                                    <th class="border-bottom-0">Amount Paid</th>
                                    <th class="border-bottom-0">Balance</th>
                                    <th class="border-bottom-0">Paid Date</th>
                                    <th class="border-bottom-0">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 'officialReceipts';
                                @endphp
                                @foreach ($officialReceipts as $officialReceipt)
                                    @php
                                        $id = $officialReceipt->id;
                                    @endphp
                                    <tr>
                                        <td>{{ $officialReceipt->invoice->patient->name }}</td>
                                        <td>{{ $officialReceipt->invoice->invoice_number }}</td>
                                        <td>{{ $officialReceipt->OR_number }}</td>

                                        <td>₱{{ number_format($officialReceipt->amount_paid, 2) }}
                                        </td>
                                        <td>₱{{ number_format($officialReceipt->invoice->invoice_detail->sum('amount') - $officialReceipt->amount_paid, 2) }}
                                        </td>
                                        <td>{{ date('d-F-Y', strtotime($officialReceipt->created_at)) }}</td>

                                        <td>
                                            <div class="btn-group">

                                                <div class="btn-group">
                                                    {{-- @if ($officialReceipt->sent_status == 0)
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('staff.official-receipts.update', ['official_receipt' => $id]) }}">Send
                                                        </a>
                                                    @else
                                                        <a class="btn btn-success btn-sm disable" aria-readonly="true">Sent
                                                        </a>
                                                    @endif --}}
                                                    <a name="" id="" class="btn btn-info btn-sm"
                                                        href="{{ route('staff.official-receipts.show', $id) }}"
                                                        role="button">
                                                        <i class="fa fa-eye"></i>

                                                    </a>

                                                    <a name="" id="" class="btn btn-warning btn-sm"
                                                        data-bs-toggle="modal" href="#edit{{ $id }}"
                                                        role="button">
                                                        <i class="fa fa-edit"></i>

                                                    </a>

                                                    <a name="" id="" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal" href="#delete{{ $id }}"
                                                        role="button">
                                                        <i class="fa fa-trash"></i>

                                                    </a>

                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @include('delete')
                                    @include('staff.official_receipt.edit')
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection