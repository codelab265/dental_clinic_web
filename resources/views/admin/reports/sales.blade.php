@extends('layout.app')
@section('title', 'Sales Report')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">
                    <div class="col-lg-4">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="col-lg-8">
                        <div class="btn-group float-end">
                            <a class="btn btn-outline-info" href="{{ route('admin.reports.medical', 'today') }}">
                                <i class="fa fa-bar-chart me-2"></i>
                                Medical record report
                            </a>
                            <a class="modal-effect btn btn-outline-success" href="#">
                                <i class="fa fa-bar-chart me-2"></i>
                                Sales report
                            </a>

                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <a class=" btn btn-info" href="{{ route('admin.reports.sales', 'today') }}">
                                    <i class="fa fa-calendar me-2"></i>
                                    Today
                                </a>
                                <a class=" btn btn-success" href="{{ route('admin.reports.sales', 'weekly') }}">
                                    <i class="fa fa-calendar me-2"></i>
                                    Weekly
                                </a>
                                <a class=" btn btn-warning" href="{{ route('admin.reports.sales', 'monthly') }}">
                                    <i class="fa fa-calendar me-2"></i>
                                    Monthly
                                </a>
                                <a class=" btn btn-danger" href="{{ route('admin.reports.sales', 'annually') }}">
                                    <i class="fa fa-calendar me-2"></i>
                                    Annual
                                </a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Patient</th>
                                    <th class="border-bottom-0">Invoice Number</th>
                                    <th class="border-bottom-0">OR Number</th>
                                    <th class="border-bottom-0">Amount Paid</th>
    
                                    <th class="border-bottom-0">Created date</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 'transactions';
                                @endphp
                                @foreach ($transactions as $transaction)
                                    @php
                                        $id = $transaction->id;
                                    @endphp
                                    <tr>
                                        <td>{{ $transaction->patient->name }}</td>
                                        <td>{{ $transaction->invoice->invoice_number }}</td>
                                        <td>{{ $transaction->officialReceipt->OR_number }}</td>
                                        <td>₱{{ number_format($transaction->officialReceipt->amount_paid, 2) }}</td>
    
                                        <td>{{ date('d-F-Y', strtotime($transaction->created_at)) }}</td>


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
