@extends('layout.app')
@section('title', 'OR details')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">

                    <div class="col-lg-12">
                        {{-- <a class=" btn btn-danger float-end" href="{{ route('staff.official-receipts.index') }}">
                            <i class="fa fa-arrow-circle-left me-2"></i>
                            Back
                        </a> --}}
                        <a onclick="Print()" class=" btn btn-secondary float-end" style="margin-right: 10px"
                            href="#">
                            <i class="fa fa-print me-2"></i>
                            Print
                        </a>

                    </div>
                </div>
                <div class="card-body" id="printableArea">
                    <div class="row">
                        <div class="col-md-10 justify-content-center">
                            Dental Clinic<br>
                            P.O Box 239<br>
                            Inc Melmo<br>
                        </div>
                        <div class="col-md-2">
                            <img src="{{ asset('assets/images/brand/logo-2.png') }}" alt="" srcset="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>
                                Billed to
                            </label>
                            <p>
                                <small>
                                    {{ $invoice->patient->name }}<br>
                                    {{ $invoice->patient->address }}<br>
                                    {{ $invoice->patient->city }}<br>
                                    {{ $invoice->patient->contact_number }}<br>
                                </small>
                            </p>
                            <p>
                                <small class="text-success text-bold">Paid Date: {{ date('d-F-Y', strtotime($officialReceipt->created_at)) }}</small>
                            </p>
                        </div>
                    </div>
                    <hr>



                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead class="bg-info border-info">
                                <tr>
                                    <th class="border-bottom-0">Service</th>
                                    <th class="border-bottom-0">Price</th>
                                    <th class="border-bottom-0">Quantity</th>
                                    <th class="border-bottom-0">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($invoice->invoice_detail as $invoiceDetail)
                                    <tr>
                                        <td>{{ $invoiceDetail->service->name }}</td>
                                        <td>₱{{ number_format($invoiceDetail->amount, 2) }}</td>
                                        <td>{{ $invoiceDetail->quantity }}</td>
                                        <td>₱{{ number_format($invoiceDetail->quantity * $invoiceDetail->amount, 2) }}</td>
                                    </tr>
                                    @php
                                        $total += $invoiceDetail->quantity * $invoiceDetail->amount;
                                    @endphp
                                @endforeach
                                <tr>
                                    <th colspan="3" style="text-align: right">
                                        Invoice Total
                                    </th>
                                    <td>
                                        ₱{{ number_format($total, 2) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align: right">
                                        Amount Paid
                                    </th>
                                    <td>
                                        ₱{{ number_format($officialReceipt->amount_paid, 2) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align: right">
                                        Balance
                                    </th>
                                    <td>
                                        ₱{{ number_format($total-$officialReceipt->amount_paid, 2) }}
                                    </td>
                                </tr>
                                
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
