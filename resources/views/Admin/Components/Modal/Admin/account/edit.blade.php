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
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Username</label>
                            <input
                                class="form-control"
                                type="text"
                                id="username"
                                name="username"
                                autofocus
                                readonly
                            />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Name</label>
                            <input class="form-control" type="text" name="name" id="name" readonly/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                                class="form-control"
                                type="text"
                                id="email"
                                name="email"
                                readonly

                            />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Role</label>
                            <select id="role" class="select2 form-select" name="role">
                                <option selected disabled>Pilih Role</option>
                                <option value="Admin">Admin</option>
                                <option value="SuperAdmin">Super Admin</option>
                                <option value="Volunteer">volunteer</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" id="editSubmit">Save Changes</button>
                    <button type="button" class="btn btn-primary" id="restart">Restar Password</button>
                </div>
            </div>
        </div>
    </div>
</form>
