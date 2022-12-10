@extends('layout.app')
@section('title', 'Transactions')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">

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
                                            <a href="{{ route('admin.invoices.show', ['invoice' => $id]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>{{ $transaction->officialReceipt->OR_number }}
                                            <a href="{{ route('admin.transactions.OR', ['id' => $id]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>₱{{ number_format($transaction->officialReceipt->amount_paid, 2) }}</td>

                                        <td>{{ date('d-F-Y', strtotime($transaction->created_at)) }}</td>


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
    </script>
@endpush
