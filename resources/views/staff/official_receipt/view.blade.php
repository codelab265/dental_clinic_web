@extends('layout.app')
@section('title', 'Official Receipts')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">
                    <div class="col-md-10">
                        {{ $invoice->patient->name }} | {{ $invoice->invoice_number }}
                    </div>
                    <div class="col-md-2">
                        <a name="" id="" class="btn btn-danger btn-sm"
                            href="{{ route('staff.official-receipts.index') }}" role="button">
                            <i class="fa fa-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
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
                                        $deduct = $officialReceipt->amount_paid + $officialReceipt->paid_already;
                                    @endphp
                                    <tr>
                                        <td>{{ $officialReceipt->invoice->patient->name }}</td>
                                        <td>{{ $officialReceipt->invoice->invoice_number }}</td>
                                        <td>{{ $officialReceipt->OR_number }}</td>

                                        <td>₱{{ number_format($officialReceipt->amount_paid, 2) }}
                                        </td>
                                        <td>₱{{ number_format($officialReceipt->invoice->invoice_detail->sum('amount') - $deduct, 2) }}
                                        </td>
                                        <td>{{ date('d-F-Y', strtotime($officialReceipt->created_at)) }}</td>

                                        <td>
                                            <div class="btn-group">

                                                <div class="btn-group">

                                                    <a name="" id="" class="btn btn-info btn-sm"
                                                        href="{{ route('staff.official-receipts.show', $id) }}"
                                                        role="button">
                                                        <i class="fa fa-eye"></i>

                                                    </a>

                                                    {{-- <a name="" id="" class="btn btn-warning btn-sm"
                                                        data-bs-toggle="modal" href="#edit{{ $id }}"
                                                        role="button">
                                                        <i class="fa fa-edit"></i>

                                                    </a> --}}

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
