@extends('layout.app')
@section('title', 'Patients')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Email</th>
                                    <th class="border-bottom-0">Contact Number</th>
                                    <th class="border-bottom-0">Gender</th>
                                    <th class="border-bottom-0">Address</th>
                                    <th class="border-bottom-0">City</th>
                                    <th class="border-bottom-0">Province</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 'patients';
                                @endphp
                                @foreach ($users as $user)
                                    @php
                                        $id = $user->id;
                                    @endphp
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->contact_number }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->city }}</td>
                                        <td>{{ $user->address }}</td>

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
