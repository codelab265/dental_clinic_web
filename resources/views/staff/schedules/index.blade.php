@extends('layout.app')

@section('title', 'Schedules')

@section('body')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">
                    <div class="col-lg-4">
                        <h3 class="card-title">@yield('title')</h3>
                    </div>
 

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Dentist</th>
                                    <th class="border-bottom-0">Patient</th>
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
                                        <td>{{ $appointment->dentist_schedule->dentist->name }}</td>
            
                                        <td>{{ $appointment->patient->name }}</td>
                                        <td>
                                            @if ($appointment->sent_status == 0)
                                                <span class="text-warning">
                                                    pending
                                                </span>
                                            @else
                                                <span class="text-success">
                                                    Sent to patient
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-info" href="{{ route('staff.schedules.view', ['id'=>$id]) }}">
                                                    View Schedule
                                                </a>
                                                @if ($appointment->sent_status == 0)
                                                    <a class="btn btn-primary"
                                                        href="{{ route('staff.schedules.update', ['id' => $id]) }}">Send to
                                                        patient</a>
                                                @else
                                                    <a class="btn btn-primary disable" aria-readonly="true">Send to
                                                        patient</a>
                                                @endif
                                            </div>
                                        </td>
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
