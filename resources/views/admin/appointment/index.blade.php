@extends('layout.app')

@section('title', 'Appointments')

@section('body')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">
                    <div class="col-lg-4">
                        <h3 class="card-title">Appointment Table</h3>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Patient Name</th>
                                    <th class="border-bottom-0">Service</th>
                                    <th class="border-bottom-0">Appointment Description</th>
                                    <th class="border-bottom-0">Status</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 'appointments';
                                @endphp
                                @foreach ($appointments as $appointment)
                                    @php
                                        $id = $appointment->id;
                                    @endphp
                                    <tr>
                                        <td>{{ $appointment->patient->name }}</td>
                                        <td>{{ $appointment->service->name }}</td>
                                        <td>{{ $appointment->description }}</td>
                                        <td>
                                            @if ($appointment->status == 0)
                                                <span class="text-warning">
                                                    Pending
                                                </span>
                                            @elseif ($appointment->status == 1)
                                                <span class="text-success">
                                                    Accepted
                                                </span>
                                            @else
                                                <span class="text-warning">
                                                    Rejected
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                {{-- <button class="btn btn-warning">Edit</button> --}}
                                                <a class="btn btn-primary" href="{{ route('admin.appointments.view', ['id'=>$id]) }}">View Schedule</a>
                                                <a class="btn btn-info" data-bs-toggle="modal"
                                                    href="#status{{ $id }}">Change Status</a>
                                            </div>
                                        </td>

                                    </tr>
                                    @include('admin.appointment.status')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
