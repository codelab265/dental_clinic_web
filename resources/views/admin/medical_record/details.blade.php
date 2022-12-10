@extends('layout.app')
@section('title', 'Medical Records')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">
                    <div class="col-lg-10">
                        <h3 class="card-title">
                            {{ $user->name }}'s Medical Record
                        </h3>
                    </div>
                    <div class="col-lg-2">
                        <a name="" id="" class="btn btn-danger btn-sm"
                            href="{{ route('admin.medical-records.index') }}" role="button">
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

                                    <th class="border-bottom-0">Date</th>
                                    <th class="border-bottom-0">Phone number</th>
                                    <th class="border-bottom-0">Service</th>
                                    <th class="border-bottom-0">Results</th>
                                    @if (Auth()->user()->role == 3)
                                        <th class="border-bottom-0">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 'medical_record';
                                @endphp
                                @foreach ($medical_records as $medical_record)
                                    @php
                                        $id = $medical_record->id;
                                    @endphp
                                    <tr>

                                        <td>{{ date('d-F-Y', strtotime($medical_record->treated_date)) }}</td>
                                        <td>{{ $medical_record->patient->contact_number }}</td>
                                        <td>{{ $medical_record->service->name }}</td>
                                        <td>{{ $medical_record->results }}</td>
                                        @if (Auth()->user()->role == 3)
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">

                                                    <button class="btn btn-warning" data-bs-effect="effect-rotate-left"
                                                        data-bs-toggle="modal" title="Tooltip on left"
                                                        href="#edit{{ $id }}">Edit</button>
                                                    <button class="btn btn-danger" data-bs-effect="effect-rotate-left"
                                                        data-bs-toggle="modal" title="Tooltip on left"
                                                        href="#delete{{ $id }}">Delete</button>

                                                </div>
                                            </td>
                                        @endif

                                    </tr>
                                    @include('delete')
                                    @include('admin.medical_record.edit')
                                    {{-- @include('admin.medical_record.view') --}}
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
