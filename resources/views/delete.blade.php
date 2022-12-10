<!-- MODAL EFFECTS -->
<div class="modal fade" id="delete{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Delete Modal</h6><button aria-label="Close" class="btn-close"
                    data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="needs-validation" enctype="multipart/form-data" method="POST" action="{{ route('delete') }}"
                novalidate>
                @csrf
                @method('delete')
                <input type="hidden" name="id" value="{{ $id }}">
                <input type="hidden" name="page" value="{{ $page }}">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-xl-12 mb-3">
                            <h4 for="validationCustom02">Are you sure you want to delete?</h4>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="btn_delete" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                </div>
        </div>
    </div>
    </form>
</div>
