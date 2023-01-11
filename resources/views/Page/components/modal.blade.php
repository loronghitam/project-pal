<form id="createForm">
    <div class="modal fade bd-example-modal-lg" id="createModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="section-top-border">
                        <h3 class="mb-30">Petunjuk Pembayaran</h3>
                        <div class="row">
                            <ul class="ordered-list">
                                <li>Isi data diri</li>
                                <li>Pilih pembayaran bank</li>
                                <li>Transfer ke rekening xxx-xxx-xxx atas nama Little Ambulance</li>
                                <li>Upload bukti pembayaran</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="createError" class="text-center"></div>
                <div class="modal-body">
                    <div class="form-floating">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name"
                               aria-describedby="floatingInputHelp" name="name"/>
                    </div>
                    <div class="form-input mt-3">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               name="email">
                    </div>
                    <div class="form-input mt-3">
                        <label for="phone">Phone</label>
                        <input type="email" class="form-control" id="phone" aria-describedby="emailHelp"
                               name="phone">
                    </div>
                    <div class="form-input mt-3">
                        <label for="donate">Jumlah Donasi</label>
                        <input type="text" class="form-control" id="uang" aria-describedby="emailHelp"
                               name="amount">
                    </div>

                    <div>
                        <legend for="donate" class="mt-3">Nomber Rekening</legend>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="radio" name="rekening" id="exampleRadios1"
                                   value="BRI">
                            <label class="form-check-label" for="exampleRadios1">
                                <img
                                    src="{{asset('assets/landingpage/img/bank/bri.png')}}"
                                    alt="" width="100px">
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rekening" id="exampleRadios2"
                                   value="BCA">
                            <label class="form-check-label" for="exampleRadios2">
                                <img
                                    src="{{asset('assets/landingpage/img/bank/bca.jpg')}}"
                                    alt="" width="120px">
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rekening" id="exampleRadios3"
                                   value="BSO">
                            <label class="form-check-label" for="exampleRadios3">
                                <img
                                    src="{{asset('assets/landingpage/img/bank/bsi.jpg')}}"
                                    alt="" width="190px">
                            </label>
                        </div>
                    </div>
                    <div class="input-group-icon mt-3">
                        <div class="icon">
                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                        </div>
                        <div class="form-select" id="default-select">
                            <select id="program" name="program">
                                <option value="" selected disabled>Pilih Program</option>
                                @foreach($program as $data)
                                    <option value="{{$data->id}}">{{ $data->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <input type="file" id="createImage" name="image" data-show-loader="false"
                               class="form-control" required data-allowed-file-extensions="jpg png"
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

@push('script')
    <script>
        $(function () {
            $("#uang").keyup(function (e) {
                $(this).val(format($(this).val()));
            });
        });
        var format = function (num) {
            var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }
            formatted = output.reverse().join("");
            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };
    </script>
@endpush
