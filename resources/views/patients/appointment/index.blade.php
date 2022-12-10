@extends('layout.app')

@section('title', 'Appointments')

@section('body')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">
                    <div class="col-lg-4">
                        <h3 class="card-title">Appointment</h3>
                    </div>
                    <div class="col-md-8">
                        <a class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" href="#add">
                            <i class="fa fa-plus-circle">
                                Add Appointment
                            </i>
                        </a>
                        @include('patients.appointment.create')
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Patient Name</th>
                                    <th class="border-bottom-0">Service</th>
                                    <th class="border-bottom-0">Description</th>
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
                                        <td>{{ @$appointment->service->name }}</td>
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
                                                    Danger
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                {{-- <button class="btn btn-warning">Edit</button> --}}
                                                <a class="btn btn-success" href="{{ route('patients.appointment.view', ['id'=>$id]) }}">View schedule</a>
                                                <a class="btn btn-danger" data-bs-toggle="modal"
                                                    href="#delete{{ $id }}">Delete</a>
                                            </div>
                                        </td>

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
        $('body').on('change','#DOW', function () {
            
            var day = $(this).val();
           $.ajax({
            type: "get",
            url: "{{ route('schedule_time') }}",
            data: {day:day},
            beforeSend:function () { 
                Loader.open();
                $('#schedule_time').html('')
             },
            success: function (response) {
                Loader.close();
                $('#schedule_time').html(response.html)
              
            }, 
            error:function(error){
                Loader.close();
                console.log(error);
            }
           });
            
        });
    </script>
@endpush
