<form id="createForm">
    <div class="modal fade bd-example-modal-lg" id="createModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-titlea" id="exampleModalLabel4">Registrasi Volinteer</h5>
                </div>
                <div id="createError" class="text-center"></div>
                <div class="modal-body">
                    <div class="form-floating">
                        <label for="name">Name</label>
                        <input type="hidden" name="program" value="" id="program"/>
                        <input type="text" class="form-control" id="name"  aria-describedby="floatingInputHelp" name="name"/>
                    </div>
                    <div class="form-input mt-3">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="form-input mt-3">
                        <label for="phone">Phone</label>
                        <input type="email" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-input mt-3">
                        <label for="donate">Motivasi</label>
                        <textarea class="form-control" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" name="motivation"></textarea>
                    </div>


                    <div class="form-group mt-3">
                        <input type="file" id="createImage" name="file" data-show-loader="false"
                               class="form-control" required data-allowed-file-extensions="pdf word"
                               data-max-file-size-preview="3M" data-max-file-size="3M">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="createSubmit">Donate</button>
                </div>
            </div>
        </div>
    </div>
</form>
