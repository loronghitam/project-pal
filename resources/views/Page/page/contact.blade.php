@extends('Page.layout.app')

@push('title')
    <title>Little Ambulance | Profile</title>
@endpush

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Profile</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap_bottom">
        <div class="container">
            <div class="section_gap">
                <div class="section-top-border">
                    <div class="row">
                        <div class="col-md-3 align-self-center text-center">
                            <h3 class="mb-30">ABOUT</h3>
                        </div>
                        <div class="col-md-9 mt-sm-20 text-center text-dark">
                            <p>
                                Little ambulance hadir untuk mempermudah penyelenggaraan pelayanan kesehatan di wilayah
                                Kecamatan Jatinangor yang lebih dititikberatkan pada upaya peningkatan kesehatan
                                (promotif), pencegahan penyakit (preventif), penyembuhan penyakit(kuratif) serta
                                pemulihan kesehatan (rehabilitatif), yang dilaksanakan secara bersama-sama antara
                                Pemerintah, sekolah dan masyarakat secara menyeluruh, terpadu dan berkesinambungan.
                            </p>
                        </div>

                        <div class="section-top-border text-right mt-3">
                            <div class="row">
                                <div class="col-md-9 text-center text-dark">
                                    <p>
                                        Little ambulance bertujuan untuk meningkatkan kesadaran, kemauan dan kemampuan
                                        hidup sehat bagi setiap orang sehingga terwujud derajat kesehatan masyarakat
                                        yang optimal tanpa membedakan status sosialnya. Little ambulance berupaya untuk
                                        memudahkan proses tersebut, untuk melayani kebutuhan masyarakat, khususnya
                                        masyarakat yang memerlukan unit ambulance untuk menuju lokasi layanan kesehatan.
                                    </p>
                                </div>
                                <div class="col-md-3 align-self-center text-center">
                                    <h3>Maksud dan Tujuan</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mapBox" class="mapBox" data-lat="-6.91419555540468" data-lon="107.78049249773242"></div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Kabupaten Sumedang, Jawa Barat</h6>
                            <p>Kecamatan Jatinangor</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">+62 819-9799-5588</a></h6>
                            <p>Siap 24 Jam</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">littleambulance.lp@gmail.com</a></h6>
                            <p>Kirim keritik dan saran</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="contact_process.php" method="post" id="contactForm"
                          novalidate="novalidate">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Enter your name" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Enter your name'">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Enter email address" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Enter email address'">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject"
                                       placeholder="Enter Subject" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Enter Subject'">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1"
                                          placeholder="Enter Message" onfocus="this.placeholder = ''"
                                          onblur="this.placeholder = 'Enter Message'"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="primary-btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->
@endsection

@push('script')
    <script !src="">
        $('#mapBox').zoom(10)
    </script>
@endpush
