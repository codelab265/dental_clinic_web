<!-- MODAL EFFECTS -->
<div class="modal fade" id="view{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Add Medical Record</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="needs-validation" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.medical-records.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <strong>
                                    PATIENT NAME
                                </strong>
                            </div>
                            <div class="col-md-8">
                                {{ $medical_record->patient->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <strong>
                                    DATE
                                </strong>
                            </div>
                            <div class="col-md-8">
                                {{ date('d-F-Y', strtotime($medical_record->treated_date)) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <strong>
                                    PHONE NUMBER
                                </strong>
                            </div>
                            <div class="col-md-8">
                                {{ $medical_record->patient->contact_number }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <strong>
                                    SERVICE
                                </strong>
                            </div>
                            <div class="col-md-8">
                                {{ $medical_record->service->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <strong>
                                    RESULTS
                                </strong>
                            </div>
                            <div class="col-md-8">
                                {{ $medical_record->results }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
    </form>
</div>
