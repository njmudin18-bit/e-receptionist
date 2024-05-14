<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>{{ $SubTitle }} | {{ config('appsproperties.APPS_NAME') }}</title>
    <!-- Meta Name -->
    <x-metas :subtitle="$SubTitle"></x-metas>
    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
      .content-page .row .card-body h2, 
      .content-page .row .card-body h3, 
      .content-page .row .card-body h4, 
      .content-page .row .card-body h5, 
      .content-page .row .card-body h6 {
        color: black !important;
      }

      .content-page .row .card-body li {
        color: black !important;
        font-size: 16px !important;
      }

      .content-page .row .card-body p { 
        color: black !important;
        font-size: 16px !important;
      }

      .clearfix.border-bottom {
        border-bottom: 2px solid grey;
      }
      
      li {
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
    <!-- Begin page -->
    <div class="wrapper">
      <!-- ========== Topbar Start ========== -->
      <x-topbar></x-topbar>
      <!-- ========== Topbar End ========== -->
      

      <!-- ========== Left Sidebar Start ========== -->
      <x-sidebar></x-sidebar>
      <!-- ========== Left Sidebar End ========== -->

      <!-- ============================================================== -->
      <!-- Start Page Content here -->
      <!-- ============================================================== -->

      <div class="content-page">
        <div class="content">
          <!-- Start Content-->
          <div class="container-fluid">
            <!-- start page title -->
            <x-breadcrumb :title="$Title" :subtitle="$SubTitle"></x-breadcrumb>
            <!-- end page title -->

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <!-- Invoice Logo-->
                    <div class="p-3">
                      <div class="row clearfix border-bottom">
                        <div class="col-sm-3 p-3 logo-xl">
                          <img src="{{ asset(config('appsproperties.COMPANY_LOGO')) }}" alt="{{ config('appsproperties.APPS_NAME') }}" height="22">
                        </div>
                        <div class="col-sm-8 text-start">
                          <h2 class="m-0">{{ strtoupper(config('appsproperties.COMPANY_NAME')) }}</h2>
                          <h5 class="mt-2">Alamat: {{ config('appsproperties.COMPANY_ADDRESS') }}</h5>
                          <h5 class="mt-1">
                            Email: {{ config('appsproperties.COMPANY_EMAIL') }}, 
                            Phone: {{ config('appsproperties.COMPANY_PHONE') }},
                            Fax: {{ config('appsproperties.COMPANY_FAX') }}
                          </h5>
                        </div>
                      </div>
                    </div>

                    <div class="">
                      <!-- Invoice Detail-->
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="text-center mt-3">
                            <h3>Scan ini untuk akses aplikasi</h3>
                            <p class="text-muted fs-13 mt-3">Scan QR dibawah ini untuk mengakses Aplikasi e-Receptionist dan lengkapi formulirnya untuk memasuki area perusahaan.</p>
                          </div>
                        </div>
                      </div>
                      <!-- end row -->

                      <div class="row mt-4">
                        <div class="col-sm-12">
                          <div id="QrSection3" class="text-center"></div>
                        </div>
                      </div>    
                      <!-- end row -->        

                      <div class="row mt-4">
                        <div class="col-sm-12">
                          <h3 class="text-center">Atau</h3>
                          <h4 class="text-center mt-3">
                            Kunjungi link URL ini untuk mengakses secara manual <span class="text-danger">{{ $LinkUrl }}</span>
                          </h4>
                        </div> <!-- end col -->
                      </div>
                      <!-- end row -->

                      <div class="row mt-4">
                        <div class="col-sm-12">
                          <div class="clearfix pt-3">
                            <h6 class="text-muted fs-16">Petunjuk pemakaian:</h6>
                            <ol>
                              <li><strong>Masuk ke aplikasi:</strong> scan QR code diatas atau kunjungi link URL <strong class="text-danger">{{ $LinkUrl }}</strong> di browser handphone anda masing-masing.</li>
                              <li><strong>Isi form:</strong> isi form sesuai dengan kebutuhan yang anda inginkan, setelah itu tekan tombol Checkin.</li>
                              <li><strong>Tiket:</strong> aplikasi akan membuatkan nomor tiket, lalu tunjukan tiket anda kepada security atau resepsionis.</li>
                              <li><strong>Checkout:</strong> tekan tombol checkout pada bagian bawah nomor tiket anda untuk keluar dari area perusahaan.</li>
                              <!-- <li>Silahkan scan <strong>QR code</strong> atau kunjungi link URL <strong class="text-danger">{{ $LinkUrl }}</strong> di browser handphone anda masing-masing.</li>
                              <li>Isi <strong>formulir</strong> sesuai dengan kebutuhan yang anda inginkan sampai selesai, lalu tekan tombol <strong>Checkin</strong>.</li>
                              <li>Anda akan mendapatkan nomor tiket re</li>
                              <li>Lalu aplikasi akan memberikan notifikasi ke Department atau Pegawai yang dituju.</li>
                              <li>Tekan tombol <strong>Checkout</strong> jika sudah selesai dengan kunjungan</li> -->
                            </ol>
                          </div>
                        </div>
                      </div>

                      @if($SyaratKetentuan->Activated == "Yes")
                      <!-- <div class="row mt-4">
                        <div class="col-sm-12">
                          <div class="clearfix pt-3">
                            <h6 class="text-muted fs-14">Notes:</h6>
                            {!! $SyaratKetentuan->TermsAndConditions !!}
                          </div>
                        </div>
                      </div> -->
                      @endif

                      <div class="d-print-none mt-4">
                        <div class="text-center">
                          <a href="javascript:window.print()" class="btn btn-primary"><i class="ri-printer-line"></i> Print</a>
                        </div>
                      </div>
                    </div>
                    <!-- end buttons -->
                  </div> <!-- end card-body-->
                </div> <!-- end card -->
              </div> <!-- end col-->
            </div>
            <!-- end row -->
          </div> <!-- container -->
        </div> <!-- content -->

        <!-- Footer Start -->
        <x-footer></x-footer>
        <!-- end Footer -->
      </div>

      <!-- ============================================================== -->
      <!-- End Page content -->
      <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <x-settings></x-settings>

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- QRCode JS -->
    <x-qrcode :title="$LinkUrl"></x-qrcode>
  </body>
</html>