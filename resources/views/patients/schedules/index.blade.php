@extends('layout.app')

@section('title', 'Schedules')

@section('body')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">
                    <div class="col-lg-4">
                        <h3 class="card-title">Schedule Table</h3>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Dentist</th>
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
            
                                        <td>
                                            Accepted
                                        </td>
                                        <td>
                                            
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-info" href="{{ route('patients.schedules.view', ['id'=>$id]) }}">
                                                    View Schedule
                                                </a>
                                              
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
