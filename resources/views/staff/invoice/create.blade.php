<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Create an Invoice</h5>
                <button type="button" class="close btn btn-primary" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('staff.invoices.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col-xl-12 mb-3 form-group">
                            <label for="validationCustom01">Patient</label>
                            <select name="patient_id" class="form-control" id="validationCustom01" required>
                                <option disabled="" selected="">Select Patient</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-xl-12 mb-3 form-group">
                            <label for="due_date">Due date</label>
                            <input type="date" name="due_date" id="due_date" class="form-control" placeholder=""
                                aria-describedby="helpId" required>

                        </div>

                        <div class="col-xl-12 mb-3 form-group">
                            <label for="">Services details</label>
                            @foreach ($services as $service)
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="service_id[]"
                                                    id="" value="{{ $service->id }}">
                                                {{ $service->name }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <span class="muted">
                                            {{ number_format($service->price) }}
                                        </span>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="number" name="quantity[]" id="" class="form-control"
                                                placeholder="Quantity">

                                        </div>
                                    </div>
                                </div>
                                <hr style="margin: 0px">
                            @endforeach
                        </div>

                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
