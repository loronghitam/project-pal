<form id="editForm">
    <div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Edit Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="errors" class="text-center"></div>
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="title-edit" placeholder="John Doe"
                               aria-describedby="floatingInputHelp" name="title"/>
                        <label for="name">Judul</label>
                    </div>

                    <div class="form-floating mt-3">
                        <input type="number" class="form-control" id="funding-edit" placeholder="Rp 100.000"
                               aria-describedby="floatingInputHelp" name="funding"/>
                        <label for="name">Target</label>
                    </div>

                    <div class="form-floating mt-3">
                        <input type="date" class="form-control" id="end_program-edit"
                               aria-describedby="floatingInputHelp" name="end_program"/>
                        <label for="name">Tanggal Selesai</label>
                    </div>

                    <div class="mt-3">
                        <label for="status-edit" class="form-label">Status Program</label>
                        <select id="status-edit" class="form-select" name="status">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="form-input mt-3">
                        <textarea name="body" id="body-edit" class="form-control"></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <input type="file" id="editImage" name="image" data-show-loader="false"
                               class="form-control" required data-allowed-file-extensions="jpg png"
                               data-max-file-size-preview="3M" data-max-file-size="3M">
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
