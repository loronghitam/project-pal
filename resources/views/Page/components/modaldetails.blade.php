<form id="createForm">
    <div class="modal fade bd-example-modal-lg" id="createModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="section-top-border">
                        <h3 class="mb-30">Petunjuk Pembayaran</h3>
                        <div class="row">
                            <ul class="ordered-list">
                                <li class="text-dark">Isi data diri</li>
                                <li class="text-dark">Pilih pembayaran bank</li>
                                <li class="text-dark">Transfer ke <b class="text-dark">BSI 7197976432</b> a/n: <b
                                        class="text-dark">Little
                                        Ambulance</b>
                                </li>
                                <li class="text-dark">Upload bukti pembayaran</li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div id="createError" class="text-center"></div>
                <div class="modal-body">
                    <div class="form-floating">
                        <label for="name" class="text-dark">Nama</label>
                        <input type="text" class="form-control" id="name"
                               aria-describedby="floatingInputHelp" name="name"/>
                    </div>
                    <div class="form-input mt-3">
                        <label for="exampleInputEmail1" class="text-dark">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               name="email">
                    </div>
                    <div class="form-input mt-3">
                        <label for="phone" class="text-dark">No Hp</label>
                        <input type="email" class="form-control" id="phone" aria-describedby="emailHelp"
                               name="phone" max="12">
                    </div>
                    <div class="form-input mt-3">
                        <label for="donate" class="text-dark">Jumlah Donasi</label>
                        <input type="text" class="form-control" id="uang" aria-describedby="emailHelp"
                               name="amount">
                    </div>

                    <div>
                        <legend for="donate" class="mt-3 text-dark">Metode Pembayaran</legend>
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
                            <select id="program" name="program" class="text-dark">
                                <option value="" selected disabled>Pilih Program</option>
                                {{--                                @foreach($program as $data)--}}
                                <option value="{{$program->id}}" selected>{{ $program->title}}</option>
                                {{--                                @endforeach--}}
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
            $("#donate").keyup(function (e) {
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

