@extends('layout.app')
@section('title', 'Transactions')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">

                    <div class="col-lg-12">
                        <a class="modal-effect btn btn-secondary-light float-end" data-bs-effect="effect-rotate-left"
                            data-bs-toggle="modal" title="Tooltip on left" href="#add">
                            <i class="fe fe-plus-circle me-2"></i>
                            Create a transaction
                        </a>
                        @include('staff.transactions.create')
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Patient</th>
                                    <th class="border-bottom-0">Invoice Number</th>
                                    <th class="border-bottom-0">OR Number</th>
                                    <th class="border-bottom-0">Amount Paid</th>
                                    <th class="border-bottom-0">Created date</th>
                                    <th class="border-bottom-0">action</th>
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
                                        <td>{{ $transaction->invoice->invoice_number }}
                                            <a href="{{ route('staff.invoices.show', ['invoice'=>$transaction->invoice_id]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>{{ $transaction->officialReceipt->OR_number }}
                                            <a href="{{ route('staff.official-receipts.show', ['official_receipt'=> $transaction->official_receipt_id]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>₱{{ number_format($transaction->officialReceipt->amount_paid, 2) }}</td>

                                        <td>{{ date('d-F-Y', strtotime($transaction->created_at)) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <div class="btn-group">

                                                    <a name="" id="" class="btn btn-danger"
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
                                    @include('staff.transactions.invoice')
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
        $('body').on('change', '#patient_id', function() {
            var id = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('medical_records') }}",
                data: {
                    id: id
                },
                success: function(response) {
                    $('#medical_record').html(response['html']);
                }
            });

            $.ajax({
                type: "get",
                url: "{{ route('invoices') }}",
                data: {
                    id: id
                },
                success: function(response) {
                    $('#invoice_id').empty();
                    $('#invoice_id').append(response['html']);
                }
            });
        });

        $('body').on('change','#invoice_id', function () {
            var id = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('OR') }}",
                data: {
                    id: id
                },
                success: function(response) {
                    $('#or_number').empty();
                    $('#or_number').append(response['html']);
                }
            });

        });
    </script>
@endpush
