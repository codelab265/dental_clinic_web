@extends('layout.app')
@section('title', 'Services')

@section('body')

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card" id="Tooltip1">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Service Name</th>
                                    <th class="border-bottom-0">Price</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $page = 'services';
                                @endphp
                                @foreach ($services as $service)
                                    @php
                                        $id = $service->id;
                                    @endphp
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        <td>₱{{ number_format($service->price, 1) }}</td>

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
