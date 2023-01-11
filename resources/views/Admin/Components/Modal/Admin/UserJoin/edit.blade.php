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
                        <input type="text" class="form-control" id="name-edit"
                               aria-describedby="floatingInputHelp" name="name" readonly/>
                        <label for="title-edit">Name</label>
                    </div>

                    <div class="form-floating mt-3">
                        <input type="text" class="form-control" id="email-edit" aria-describedby="floatingInputHelp"
                               name="email" readonly/>
                        <label for="title-edit">Email</label>
                    </div>

                    <div class="form-floating mt-3">
                        <input type="text" class="form-control" id="phone-edit" aria-describedby="floatingInputHelp"
                               name="email" readonly/>
                        <label for="title-edit">Phone</label>
                    </div>

                    <div class="form-floating mt-3">
                        <input type="text" class="form-control" id="motivation-edit"
                               aria-describedby="floatingInputHelp" name="phone" readonly/>
                        <label for="title-edit">Motivasi</label>
                    </div>

                    {{--                    <div class="form-floating mt-3">--}}
                    {{--                        <input type="text" class="form-control" id="amount-edit" placeholder="John Doe"--}}
                    {{--                               aria-describedby="floatingInputHelp" name="title" readonly/>--}}
                    {{--                        <label for="amount-edit">Phone</label>--}}
                    {{--                    </div>--}}

                    {{--                    <img src="" alt="" id="image-edit">--}}

                    <div class="form-check form-switch mt-3">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="prioritas"/>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Diterima</label>
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
