<form id="editForm">
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Modal title</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div id="editError" class="text-center"></div>
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="title-edit" placeholder="John Doe" aria-describedby="floatingInputHelp" name="title"/>
                        <label for="title-edit">Judul</label>
                    </div>
                    <div class="form-input mt-3">
                        <textarea name="body" id="body-edit" class="form-control"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <input type="file" id="editImage" name="image" data-show-loader="true"
                               class="dropify" required data-allowed-file-extensions="jpg png"
                               data-max-file-size-preview="3M" data-max-file-size="3M"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" id="editSubmit">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
