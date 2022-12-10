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
                    <div class="col-lg-8">
                        {{-- <a class="modal-effect btn btn-secondary-light float-end" data-bs-effect="effect-rotate-left"
                            data-bs-toggle="modal" title="Tooltip on left" href="#add">
                            <i class="fe fe-plus-circle me-2"></i>
                            Add Schedule
                        </a> --}}
                        {{-- @include('admin.schedules.create') --}}
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Dentist</th>
                                   
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 'schedules';
                                    
                                @endphp
                                @php
                                function days ($day){
                                    if($day==1){
                                        return "Monday";
                                    }elseif($day==2){
                                        return "Tuesday";
                                    }elseif($day==3){
                                        return "Wednesday";
                                    }elseif($day==4){
                                        return "Thursday";
                                    }elseif($day==5){
                                        return "Friday";
                                    }elseif($day==6){
                                        return "Saturday";
                                    }elseif($day==7){
                                        return "Sunday";
                                    }
                                }
                            @endphp
                                @foreach ($users as $user)
                                    @php
                                        $id = $user->id;
                                    @endphp
                                    <tr>
                                        <td>{{ $user->name }}</td>
    
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success"
                                                    href="{{ route('admin.schedule.calendar', ['id'=>$id]) }}">
                                                    View Schedules
                                                </a>

                                                <button class="btn btn-warning" data-bs-effect="effect-rotate-left"
                                                    data-bs-toggle="modal" title="Tooltip on left"
                                                    href="#edit{{ $id }}">
                                                    Edit Schedules
                                                </button>
                                                {{-- <button class="btn btn-danger" data-bs-effect="effect-rotate-left"
                                                    data-bs-toggle="modal" title="Tooltip on left"
                                                    href="#delete{{ $id }}">Delete</button> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    @include('delete')
                                    @include('admin.schedules.edit')
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
