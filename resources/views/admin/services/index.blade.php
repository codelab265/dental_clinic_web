@extends('layout.app')
@section('title', 'Services')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">
                <div class="card-header">
                    <div class="col-lg-4">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="col-lg-8">
                        <a class="modal-effect btn btn-secondary-light float-end" data-bs-effect="effect-rotate-left"
                            data-bs-toggle="modal" title="Tooltip on left" href="#add">
                            <i class="fe fe-plus-circle me-2"></i>
                            Add Services
                        </a>
                        @include('admin.services.create');
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Service Name</th>
                                    <th class="border-bottom-0">Price</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = "services";
                                @endphp
                                @foreach ($services as $service)
                                    @php
                                        $id = $service->id;
                                    @endphp
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        <td>₱{{ number_format($service->price, 1) }}</td>
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
                                    </tr>
                                    @include('delete')
                                    @include('admin.services.edit')
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
