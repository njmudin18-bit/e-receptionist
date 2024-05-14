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
  </head>

  <body class="authentication-bg">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xxl-8 col-lg-10">
            <div class="card overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6 d-none d-lg-block p-2">
                  <img src="{{ asset('assets/images/auth-img.jpg') }}" alt="" class="img-fluid rounded h-100">
                </div>
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <div class="auth-brand p-4 text-center">
                      <a href="{{ route('visitor.index') }}" class="logo-light">
                        <img src="{{ asset(config('appsproperties.COMPANY_LOGO')) }}" alt="logo {{ config('appsproperties.COMPANY_NAME') }}" height="50">
                      </a>
                      <a href="{{ route('visitor.index') }}" class="logo-dark">
                        <img src="{{ asset(config('appsproperties.COMPANY_LOGO')) }}" alt="dark logo {{ config('appsproperties.COMPANY_NAME') }}" height="50">
                      </a>
                    </div>
                    <div class="p-4 my-autoXX">
                      <div class="text-center w-100 m-auto">
                        <img src="{{ asset('assets/images/svg/shield.gif') }}" height="64" alt="{{ config('appsproperties.COMPANY_NAME') }}" class="rounded-circle img-fluid img-thumbnail avatar-xl" style="background-color: #fff;">
                        @if($Visitor->Status == 'In')
                        <h4 class="text-center mt-3 fw-bold fs-20">Registerasi Selesai</h4>
                        <p class="text-muted mb-4">Terima kasih Anda telah menyelesaikan registerasi pengunjung di {{ strtoupper(config('appsproperties.COMPANY_NAME')) }}.</p>
                        @endif

                        @if($Visitor->Status == 'Out')
                        <h4 class="text-center mt-3 fw-bold fs-20">Sukses Checkout</h4>
                        <p class="text-muted mb-4">Anda telah menyelesaikan kunjungan Anda ke perusahaan kami. Terima kasih telah menggunakan <br> {{ config('appsproperties.APPS_NAME') }} {{ strtoupper(config('appsproperties.COMPANY_NAME')) }}. </p>
                        @endif
                      </div>

                      <!-- form -->
                      <form action="#">
                        @if($Visitor->Status == 'In')
                        <div class="row mb-2">
                          <div class="col-5">
                            <label for="Nama" class="form-label text-capitalize">Tiket</label>
                          </div>
                          <div class="col-7">
                            <label for="Nama" class="form-label text-capitalize">{{ $Visitor->Tickets == '' ? '-' : $Visitor->Tickets }}</label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-5">
                            <label for="Nama" class="form-label text-capitalize">Nama</label>
                          </div>
                          <div class="col-7">
                            <label for="Nama" class="form-label text-capitalize">{{ $Visitor->VisitorName == '' ? '-' : $Visitor->VisitorName }}</label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-5">
                            <label for="Nama" class="form-label text-capitalize">Perusahaan</label>
                          </div>
                          <div class="col-7">
                            <label for="Nama" class="form-label text-capitalize">{{ $Visitor->VisitorCompany == '' ? '-' : $Visitor->VisitorCompany }}</label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-5">
                            <label for="Nama" class="form-label text-capitalize">Tujuan kedatangan</label>
                          </div>
                          <div class="col-7">
                            <label for="Nama" class="form-label text-capitalize">{{ $Visitor->ArrivalDestination == '' ? '-' : $Visitor->ArrivalDestination }}</label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-5">
                            <label for="password" class="form-label text-capitalize">Department tujuan</label>
                          </div>
                          <div class="col-7">
                            <label for="Nama" class="form-label text-capitalize">{{ $Visitor->DepartmentDestination == '' ? '-' : $Visitor->DepartmentDestination }}</label>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-5">
                            <label for="password" class="form-label text-capitalize">Nama tujuan</label>
                          </div>
                          <div class="col-7">
                            <label for="Nama" class="form-label text-capitalize">{{ $Visitor->AddresseesName == '' ? '-' : $Visitor->AddresseesName }}</label>
                          </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                          <label for="password" class="form-label text-capitalize"></label>
                          <div id="QrSection4" class="text-center mb-3">
                          <!-- <input class="form-control text-center text-danger form-control-lg fs-2" type="text" value="{{ $Ticket }}" id="password" placeholder="Tiket anda" style="border: 2px solid indianred;" disabled> -->
                        </div>

                        <div class="mb-0 text-start">
                          <p class="text-muted mb-3 text-center fw-bold">Pindai kode QR untuk informasi lebih lanjut.</p>
                          <!--p class="text-muted mb-4 text-center">Ini adalah kode pengunjung Anda, harap perlihatkan kepada resepsionis atau security untuk melakukan proses <i>Checkin</i>.</p-->
                        </div>
                        @endif

                        <div class="text-center mt-3">
                          <p class="text-muted fs-16">Checkout?</p>
                          <div class="d-flex gap-2 justify-content-center mt-2">
                            @if($Visitor->Status == 'In')
                            <button class="btn btn-soft-danger w-100" type="button" onclick="checkout('{{ $Email }}', '{{ $Ticket }}', '{{ $Channel }}')">
                              <i class="ri-logout-circle-fill me-1"></i> 
                              <span class="fw-bold">Checkout sekarang</span> 
                            </button>
                            @endif

                            @if($Visitor->Status == 'Out')
                            <button class="btn btn-soft-danger w-100 text-white" type="button" disabled>
                              <i class="ri-logout-circle-fill me-1"></i> 
                              <span class="fw-bold">Anda sudah checkout</span> 
                            </button>
                            @endif
                          </div>
                        </div>
                      </form>
                      <!-- end form-->
                    </div>
                  </div>
                </div> <!-- end col -->
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <p class="text-dark-emphasis">Back to
              <a href="{{ route('visitor.index') }}" class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Registerasi ulang</b></a>
            </p>
          </div> <!-- end col -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
      <span class="text-dark">{{ config('appsproperties.APPS_COPYRIGHT') }}</span>
    </footer>

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/customs.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- QRCode JS -->
    <x-qrcode :title="$LinkUrl"></x-qrcode>
    <script>
      function checkout(Email, Ticket, Channel) {
        Swal.fire({
          title: "Anda yakin ingin checkout?",
          text: "Pastikan anda akan keluar dari area perusahaan setelah menekan tombol checkout.",
          icon: "question",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Ya, chekcout!",
          cancelButtonText: "Nanti, saja",
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url : "{{ route('visitor.checkout-manual') }}",
              type: "POST",
              data: {
                Emails: Email,
                Tickets: Ticket,
                Channels: Channel,
                Date: "{{ date('Y-m-d H:i:s') }}",
                "_token": "{{ csrf_token() }}"
              },
              dataType: "JSON",
              beforeSend: function (params) {
                $("#loading").show();
              },
              success: function(data)
              {
                location.reload();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                let ErrorResaponses = jqXHR;
                if (jqXHR.status == 422) {
                  Swal.fire({
                    title: capitalizeFirstLetter(textStatus + " " + jqXHR.status),
                    text: jqXHR.statusText,
                    icon: textStatus
                  });
                } else if(jqXHR.status == 500) {
                  Swal.fire({
                    title: capitalizeFirstLetter(textStatus + " " + jqXHR.status),
                    text: "Oops something went wrong",
                    icon: textStatus
                  });
                }
              }
            });
          }
        });
      }
    </script>
  </body>
</html>