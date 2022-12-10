@extends('layout.app')
@section('title', 'Medical Records Report')

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
                            <a class="modal-effect btn btn-outline-info" href="#">
                                <i class="fa fa-bar-chart me-2"></i>
                                Medical record report
                            </a>
                            @if (Auth()->user()->role == 1)
                                <a class="btn btn-outline-success" href="{{ route('admin.reports.sales', 'today') }}">
                                    <i class="fa fa-bar-chart me-2"></i>
                                    Sales report
                                </a>
                            @endif

                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <a class=" btn btn-info" href="{{ route('admin.reports.medical', 'today') }}">
                                    <i class="fa fa-calendar me-2"></i>
                                    Today
                                </a>
                                <a class=" btn btn-success" href="{{ route('admin.reports.medical', 'weekly') }}">
                                    <i class="fa fa-calendar me-2"></i>
                                    Weekly
                                </a>
                                <a class=" btn btn-warning" href="{{ route('admin.reports.medical', 'monthly') }}">
                                    <i class="fa fa-calendar me-2"></i>
                                    Monthly
                                </a>
                                <a class=" btn btn-danger" href="{{ route('admin.reports.medical', 'annually') }}">
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
                                    <th class="border-bottom-0">Dentist Name</th>
                                    <th class="border-bottom-0">Patient Name</th>
                                    <th class="border-bottom-0">Diagnosis Results</th>
                                    <th class="border-bottom-0">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 'medical_record';
                                @endphp
                                @foreach ($medicalRecords as $medical_record)
                                    @php
                                        $id = $medical_record->id;
                                    @endphp
                                    <tr>
                                        <td>{{ $medical_record->dentist->name }}</td>
                                        <td>{{ $medical_record->patient->name }}</td>
                                        <td>{{ $medical_record->results }}</td>
                                        <td>{{ date('d-F-Y', strtotime($medical_record->created_at)) }}</td>

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
