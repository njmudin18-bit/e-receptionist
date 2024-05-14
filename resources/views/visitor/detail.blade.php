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
                
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <div class="p-4 my-autoXX">
                      <h4 class="fs-20">{{ $SubTitle }}</h4>
                      <p class="text-muted mb-3">Berikut terlampir info pengunjung.</p>
                      <!-- form -->
                      <form action="#">
                        <div class="mb-2">
                          <label for="VisitorName" class="form-label">Nama</label>
                          <input class="form-control" type="text" id="VisitorName" name="VisitorName" value="{{ $Visitor->VisitorName }}" disabled>
                        </div>
                        <div class="mb-2">
                          <label for="VisitorEmail" class="form-label">Email</label>
                          <input class="form-control" type="text" id="VisitorEmail" name="VisitorEmail" value="{{ $Visitor->VisitorEmail }}" disabled>
                        </div>
                        <div class="mb-2">
                          <label for="VisitorPhone" class="form-label">Telepon</label>
                          <input class="form-control" type="text" id="VisitorPhone" name="VisitorPhone" value="{{ $Visitor->VisitorPhone == '' ? '-' : $Visitor->VisitorPhone }}" disabled>
                        </div>
                        <div class="mb-2">
                          <label for="VisitorGender" class="form-label">Jenis kelamin</label>
                          <input class="form-control" type="text" id="VisitorGender" name="VisitorGender" value="{{ $Visitor->VisitorGender == 'L' ? 'Laki-laki' : 'Perempuan' }}" disabled>
                        </div>
                        <div class="mb-2">
                          <label for="VisitorAddress" class="form-label">Alamat</label>
                          <input class="form-control" type="text" id="VisitorAddress" name="VisitorPhone" value="{{ $Visitor->VisitorAddress == '' ? '-' : $Visitor->VisitorAddress }}" disabled>
                        </div>
                        <div class="mb-2">
                          <label for="VisitorCompany" class="form-label">Perusahaan</label>
                          <input class="form-control" type="text" id="VisitorCompany" name="VisitorCompany" value="{{ $Visitor->VisitorCompany == '' ? '-' : $Visitor->VisitorCompany }}" disabled>
                        </div>
                      </form>
                      <!-- end form-->
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <div class="p-4 my-autoXX">
                      <h4 class="fs-20">Tujuan kedatangan</h4>
                      <p class="text-muted mb-3">Berikut tujuan kedatangan pengunjung.</p>
                      <!-- form -->
                      <form action="#">
                        <div class="mb-2">
                          <label for="DepartmentDestination" class="form-label">Dept. tujuan</label>
                          <input class="form-control" type="text" id="DepartmentDestination" name="DepartmentDestination" value="{{ $Visitor->DepartmentDestination == '' ? '-' : $Visitor->DepartmentDestination }}" disabled>
                        </div>
                        <div class="mb-2">
                          <label for="AddresseesName" class="form-label">Nama tujuan</label>
                          <input class="form-control" type="text" id="AddresseesName" name="AddresseesName" value="{{ $Visitor->AddresseesName }}" disabled>
                        </div>
                        <div class="mb-2">
                          <label for="AddresseesPhone" class="form-label">Telepon tujuan</label>
                          <input class="form-control" type="text" id="AddresseesPhone" name="AddresseesPhone" value="{{ $Visitor->AddresseesPhone == '' ? '-' : $Visitor->AddresseesPhone }}" disabled>
                        </div>
                        <div class="mb-2">
                          <label for="ArrivalDestination" class="form-label">Tujuan kedatangan</label>
                          <input class="form-control" type="text" id="ArrivalDestination" name="ArrivalDestination" value="{{ $Visitor->ArrivalDestination == '' ? '-' : $Visitor->ArrivalDestination }}" disabled>
                        </div>
                        <div class="mb-2">
                          <label for="NumberOfPersons" class="form-label">Banyaknya orang yang datang bersama</label>
                          <input class="form-control" type="text" id="NumberOfPersons" name="NumberOfPersons" value="{{ $Visitor->NumberOfPersons == '' ? '0' : $Visitor->NumberOfPersons }}" disabled>
                        </div>
                        
                        <div class="mt-4 text-start">
                          @if($Visitor->Status == 'In')
                          <button class="btn btn-soft-danger w-100" type="button" onclick="checkout('{{ $Email }}', '{{ $Ticket }}', '{{ $Channel }}')">
                            <i class="ri-logout-circle-fill me-1"></i> 
                            <span class="fw-bold">Checkout sekarang</span> 
                          </button>
                          @endif

                          @if($Visitor->Status == 'Out')
                          <button class="btn btn-soft-danger w-100 text-white" type="button" disabled>
                            <i class="ri-logout-circle-fill me-1"></i> 
                            <span class="fw-bold">Sudah checkout</span> 
                          </button>
                          @endif
                        </div>
                      </form>
                      <!-- end form-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- <div class="row">
          <div class="col-12 text-center">
            <p class="text-dark-emphasis">Back to
              <a href="{{ route('visitor.index') }}" class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Registerasi ulang</b></a>
            </p>
          </div>
        </div> -->
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
    <script>
      function checkout(Email, Ticket, Channel) {
        Swal.fire({
          title: "Ingin checkout?",
          text: "Pastikan pengunjung akan segera keluar dari area perusahaan setelah menekan tombol checkout.",
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