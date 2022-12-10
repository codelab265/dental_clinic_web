@extends('layout.app')
@section('title', 'Medical Records')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">
                    <div class="col-lg-4">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="col-lg-8">
                        @if (Auth()->user()->role == 3)
                            <a class="modal-effect btn btn-secondary-light float-end" data-bs-effect="effect-rotate-left"
                                data-bs-toggle="modal" title="Tooltip on left" href="#add">
                                <i class="fe fe-plus-circle me-2"></i>
                                Add medical record
                            </a>
                            @include('admin.medical_record.create');
                        @endif
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>

                                    <th class="border-bottom-0">Patient Name</th>

                                    <th class="border-bottom-0">Number of records</th>

                                    <th class="border-bottom-0">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 'medical_record';
                                @endphp
                                @foreach ($users as $user)
                                    @php
                                        $id = $user->id;
                                    @endphp
                                    <tr>

                                        <td>{{ $user->name }}</td>

                                        <td>{{ $user->medical_record->count() }}</td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a class="btn btn-success" data-bs-effect="effect-rotate-left"
                                                    href="{{ route('admin.medical-records.show', ['medical_record' => $id]) }}">
                                                    View Records
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                    @include('delete')
                                    {{-- @include('admin.medical_record.edit') --}}
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
