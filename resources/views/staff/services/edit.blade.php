<!-- MODAL EFFECTS -->
<div class="modal fade" id="edit{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Edit Services</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="needs-validation" enctype="multipart/form-data" method="POST"
                action="{{ route('staff.services.update', $id) }}">
                @csrf
                @method('patch')
                <input type="hidden" name="id" value="{{ $id }}">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-xl-12 mb-3">
                            <label for="validationCustom02">Service Name</label>
                            <input type="test" name="name" class="form-control" id="validationCustom02"
                                placeholder="Enter Service Name" value="{{ $service->name }}" required>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-xl-12 mb-3">
                            <label for="validationCustom02">Price</label>
                            <input type="number" name="price" class="form-control" id="validationCustom02"
                                placeholder="Enter Price" value="{{ $service->price }}" required>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
    </form>
</div>
