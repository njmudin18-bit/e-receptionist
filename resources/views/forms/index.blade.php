<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>{{ $SubTitle }} | {{ config('appsproperties.APPS_NAME') }}</title>
    <!-- Meta Name -->
    <x-metas :subtitle="$SubTitle"></x-metas>
    <!-- Datatables css -->
    <x-datatablecss></x-datatablecss>
    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                  <div class="card-header">
                    <h4 class="header-title">QR Formulir Registrasi Pengunjung</h4>
                  </div>
                  <div class="card-body">
                    <div class="container">
                      <div class="row mt-3">
                        <div class="col-md-3 col-sm-12 text-center">
                          <div id="QrSection" class=""></div>
                          <p class="mt-2 mb-3">Kode QR</p>
                        </div>
                        <div class="col-md-9 col-sm-12">
                          <p class="mt-3">Lihat kemudian pindai Kode QR untuk masuk ke formulir registrasi pengunjung atau cetak Kode QR untuk mendapatkan QR secara fisik</p>
                          <div class="mt-3">
                            <button type="button" class="btn btn-primary me-2" onclick="LihatQR()">Lihat Kode QR</button>
                            <button type="button" class="btn btn-primary" onclick="OpenNewTab()">Cetak Kode QR</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> <!-- end card body-->
                </div> <!-- end card -->
              </div><!-- end col-->
            </div> <!-- end row-->

            <div class="row data-diri">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="header-title">Kustomisasi Formulir Registrasi Pengunjung</h4>
                  </div>
                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <p class="mb-2">Anda dapat mengatur formulir registrasi pengunjung dengan:</p>
                        <ul class="ms-2">
                          <li class="mb-1">Aktifkan/matikan kategori untuk memunculkan/menyembunyikan isi formulir</li>
                          <li class="mb-1">Sesuaikan isi formulir dengan mengatur komponen formulir</li>
                          <li class="mb-1">Tambah kategori untuk menambah kategori formulir</li>
                        </ul>
                      </div>
                      <hr class="mt-3 mb-3">
                      <div class="row mt-3">
                        <div class="col-sm-3 mb-2 mb-sm-0">
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link mb-3 active show" id="v-data-pribadi-tab" data-bs-toggle="pill" href="#v-data-pribadi" role="tab" aria-controls="v-pills-home" aria-selected="true">
                              Data Pribadi
                            </a>
                            <a class="nav-link mb-3" id="v-data-kunjungan-tab" data-bs-toggle="pill" href="#v-data-kunjungan" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                              Tujuan Kunjungan
                            </a>
                            <!-- <a class="nav-link mb-3" id="v-pernyataan-kesehatan-tab" data-bs-toggle="pill" href="#v-pernyataan-kesehatan" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                              Pernyataan Kesehatan
                            </a> -->
                            <a class="nav-link mb-3" id="v-syarat-ketentuan-tab" data-bs-toggle="pill" href="#v-syarat-ketentuan" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                              Syarat dan Ketentuan
                            </a>
                          </div>
                        </div> <!-- end col-->

                        <div class="col-sm-9">
                          <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade active show" id="v-data-pribadi" role="tabpanel" aria-labelledby="v-data-pribadi-tab">
                              <h5>Data Diri</h5>
                              <hr class="mt-3 mb-3">
                              <form id="FormDataDiri"></form>
                            </div>
                            <div class="tab-pane fade" id="v-data-kunjungan" role="tabpanel" aria-labelledby="v-data-kunjungan-tab">  
                              <h5>
                                Tujuan Kunjungan
                                <span class="float-end">
                                  <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="ActivatedTujuanAll" name="ActivatedTujuanAll" onclick="ActivatedFormTujuan()">
                                    <label class="form-check-label" for="ActivatedTujuanAll">Aktifkan form ini?</label>
                                  </div>
                                </span>
                              </h5>
                              <hr class="mt-3 mb-3">
                              <form id="FormTujuan"></form>
                            </div>
                            <!-- <div class="tab-pane fade" id="v-pernyataan-kesehatan" role="tabpanel" aria-labelledby="v-pernyataan-kesehatan-tab">
                              <h5 class="mb-4">Pernyataan Kesehatan</h5>  
                              <p class="mb-0">Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis
                                    natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque
                                    eu, pretium quis, sem. Nulla consequat massa quis enim. Cillum ad ut irure tempor velit nostrud occaecat ullamco
                                    aliqua anim Leggings sint. Veniam sint duis incididunt do esse magna mollit excepteur laborum qui.</p>
                            </div> -->
                            <div class="tab-pane fade" id="v-syarat-ketentuan" role="tabpanel" aria-labelledby="v-syarat-ketentuan-tab">
                              <h5 class="mb-4">
                                Syarat dan Ketentuan
                                <span class="float-end">
                                  <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="ActivatedFormSK" name="ActivatedFormSK" onclick="ActivatedFormSK()">
                                    <label class="form-check-label" for="ActivatedFormSK">Aktifkan form ini?</label>
                                  </div>
                                </span>
                              </h5>
                              <hr class="mt-3 mb-3">
                              <p class="mb-3">Syarat dan ketentuan mengatur hubungan kontrak antara manajemen kantor/gedung dan pengunjung. Jika terdapat syarat dan ketentuan yang harus disetujui oleh calon pengunjung, maka tuliskan syarat dan ketentuan di bawah ini.</p>
                              <form id="FormSyaratDanKetentuan">
                                <textarea id="SyaratDanKetentuan" name="SyaratDanKetentuan"></textarea>
                                <div class="row mt-3 mb-3 float-end">
                                  <label for="inputEmail3" class="col-12 col-form-label">
                                    <button type="button" class="btn btn-primary" onclick="UpdateFormSK()">Simpan Formulir Syarat dan Ketentuan</button>
                                  </label>
                                </div>
                              </form>
                            </div>
                          </div> <!-- end tab-content-->
                        </div> <!-- end col-->
                      </div>
                    </div>
                  </div> <!-- end card body-->
                </div> <!-- end card -->
              </div><!-- end col-->
            </div> <!-- end row-->

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

    <!-- Loader -->
    <x-loader></x-loader>

    <!-- Success Alert Modal -->
    <div id="ModalLihatQR" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-filled">
          <div class="modal-body p-4">
            <div id="QrSection2" class="text-center"></div>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- Datatables js -->
    <x-datatablejs></x-datatablejs>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/customs.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <!-- QRCode JS -->
    <x-qrcode :title="$LinkUrl"></x-qrcode>
    <script>
      var save_method;
      var url;

      function OpenNewTab() {
        window.open("{{ route('qr.qr-preview') }}", '_blank');
      }

      function LihatQR() {
        $('#ModalLihatQR').modal('show');
      }

      function UpdateFormDataDiri() {
        let NameCheckbox    = $('[name="NameCheckbox"]').is(":checked");
        let Name            = NameCheckbox == true ? "Yes" : "No";

        let EmailCheckbox   = $('[name="EmailCheckbox"]').is(":checked");
        let Email           = EmailCheckbox == true ? "Yes" : "No";

        let PhoneCheckbox   = $('[name="PhoneCheckbox"]').is(":checked");
        let Phone           = PhoneCheckbox == true ? "Yes" : "No";

        let GenderCheckbox  = $('[name="GenderCheckbox"]').is(":checked");
        let Gender          = GenderCheckbox == true ? "Yes" : "No";

        let AddressCheckbox = $('[name="AddressCheckbox"]').is(":checked");
        let Address         = AddressCheckbox == true ? "Yes" : "No";

        let CompanyCheckbox = $('[name="CompanyCheckbox"]').is(":checked");
        let Company         = CompanyCheckbox == true ? "Yes" : "No";

        $.ajax({
          data: {
            Names: Name,
            Emails: Email,
            Phones: Phone,
            Genders: Gender,
            Addresss: Address,
            Companys: Company,
            "_token": "{{ csrf_token() }}"
          },
          url: "{{ route('form.updated-form-data-diri') }}",
          type: "POST",
          dataType: "JSON",
          beforeSend: function(data) {
            $("#loading").show();
          },
          success: function(data) {
            $("#loading").hide();
            $("#FormDataDiri").html(data.form_data_diri);

            if (data.data_diri.Gender == "Yes") {
              $("#Gender1").prop('checked', true);
              $("#Gender2").prop('checked', true);
            } else {
              $("#Gender1").prop('checked', false);
              $("#Gender2").prop('checked', false);
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire(
              'Oops...',
              jqXHR.responseJSON.message,
              textStatus
            );
            $("#loading").hide();
          }
        });
      }

      function UpdateFormTujuan() {
        let ActivatedTujuanAll              = $('[name="ActivatedTujuanAll"]').is(":checked");
        let TujuanAll                       = ActivatedTujuanAll == true ? "Yes" : "No";

        let AddresseesNameCheckbox          = $('[name="AddresseesNameCheckbox"]').is(":checked");
        let AddresseesName                  = AddresseesNameCheckbox == true ? "Yes" : "No";

        let AddresseesPhoneCheckbox         = $('[name="AddresseesPhoneCheckbox"]').is(":checked");
        let AddresseesPhone                 = AddresseesPhoneCheckbox == true ? "Yes" : "No";

        let DepartmentDestinationCheckbox   = $('[name="DepartmentDestinationCheckbox"]').is(":checked");
        let DepartmentDestination           = DepartmentDestinationCheckbox == true ? "Yes" : "No";

        let ArrivalDestinationCheckbox      = $('[name="ArrivalDestinationCheckbox"]').is(":checked");
        let ArrivalDestination              = ArrivalDestinationCheckbox == true ? "Yes" : "No";

        let NumberOfPersonsCheckbox         = $('[name="NumberOfPersonsCheckbox"]').is(":checked");
        let NumberOfPerson                  = NumberOfPersonsCheckbox == true ? "Yes" : "No";

        $.ajax({
          data: {
            Activated: TujuanAll,
            AddresseesNames: AddresseesName,
            AddresseesPhones: AddresseesPhone,
            DepartmentDestinations: DepartmentDestination,
            ArrivalDestinations: ArrivalDestination,
            NumberOfPersons: NumberOfPerson,
            "_token": "{{ csrf_token() }}"
          },
          url: "{{ route('form.updated-form-tujuan') }}",
          type: "POST",
          dataType: "JSON",
          beforeSend: function(data) {
            $("#loading").show();
          },
          success: function(data) {
            $("#loading").hide();
            $("#FormTujuan").html(data.form_tujuan);

            var CbTujuan    = data.tujuan.ArrivalDestination;
            var TxTujuan1   = document.getElementById('Tujuan1');
            var TxTujuan2   = document.getElementById('Tujuan2');
            var TxTujuan3   = document.getElementById('Tujuan3');
            var TxTujuan4   = document.getElementById('Tujuan4');
            var TxTujuan5   = document.getElementById('Tujuan5');
            if (CbTujuan == 'Yes') {
              TxTujuan1.checked = true;
              TxTujuan2.checked = true;
              TxTujuan3.checked = true;
              TxTujuan4.checked = true;
              TxTujuan5.checked = true;
            } else {
              TxTujuan1.checked = false;
              TxTujuan2.checked = false;
              TxTujuan3.checked = false;
              TxTujuan4.checked = false;
              TxTujuan5.checked = false;
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire(
              'Oops...',
              jqXHR.responseJSON.message,
              textStatus
            );
            $("#loading").hide();
          }
        });
      }

      function ActivatedFormTujuan() {
        let ActivatedTujuanAll  = $('[name="ActivatedTujuanAll"]').is(":checked");
        let TujuanAll           = ActivatedTujuanAll == true ? "Yes" : "No";

        if (TujuanAll == "Yes") {
          $("#FormTujuan").show();
        } else {
          $("#FormTujuan").hide();
        }

        $.ajax({
          data: {
            activated: TujuanAll,
            "_token": "{{ csrf_token() }}"
          },
          url: "{{ route('form.activated-form-tujuan') }}",
          type: "POST",
          dataType: "JSON",
          beforeSend: function(data) {
            $("#loading").show();
          },
          success: function(data) {
            $("#loading").hide();
            $("#FormTujuan").html(data.form_tujuan);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire(
              'Oops...',
              jqXHR.responseJSON.message,
              textStatus
            );
            $("#loading").hide();
          }
        });
      }

      function ActivatedFormSK() {
        let ActivatedFormSK   = $('[name="ActivatedFormSK"]').is(":checked");
        let FormSK            = ActivatedFormSK == true ? "Yes" : "No";

        $.ajax({
          data: {
            activated: FormSK,
            "_token": "{{ csrf_token() }}"
          },
          url: "{{ route('form.activated-form-syarat-dan-ketentuan') }}",
          type: "POST",
          dataType: "JSON",
          beforeSend: function(data) {
            $("#loading").show();
          },
          success: function(data) {
            $("#loading").hide();
            if (data.syarat_ketentuan.Activated == "Yes") {
              $("#ActivatedFormSK").prop('checked', true);
              $('#SyaratDanKetentuan').summernote('enable');
            } else {
              $("#ActivatedFormSK").prop('checked', false);
              $('#SyaratDanKetentuan').summernote('disable');
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire(
              'Oops...',
              jqXHR.responseJSON.message,
              textStatus
            );
            $("#loading").hide();
          }
        });
      }

      function UpdateFormSK() {
        let ActivatedFormSK     = $('[name="ActivatedFormSK"]').is(":checked");
        let FormSK              = ActivatedFormSK == true ? "Yes" : "No";

        let SyaratDanKetentuan  = $('[name="SyaratDanKetentuan"]').val();

        $.ajax({
          data: {
            Activated: FormSK,
            SyaratDanKetentuans: SyaratDanKetentuan,
            "_token": "{{ csrf_token() }}"
          },
          url: "{{ route('form.updated-form-syarat-dan-ketentuan') }}",
          type: "POST",
          dataType: "JSON",
          beforeSend: function(data) {
            $("#loading").show();
          },
          success: function(data) {
            $("#loading").hide();
            if (data.syarat_ketentuan.Activated == "Yes") {
              $("#ActivatedFormSK").prop('checked', true);
              $('#SyaratDanKetentuan').summernote('enable');
              $('#SyaratDanKetentuan').summernote('code', data.syarat_ketentuan.TermsAndConditions);
            } else {
              $("#ActivatedFormSK").prop('checked', false);
              $('#SyaratDanKetentuan').summernote('disable');
              $('#SyaratDanKetentuan').summernote('code', data.syarat_ketentuan.TermsAndConditions);
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire(
              'Oops...',
              jqXHR.responseJSON.message,
              textStatus
            );
            $("#loading").hide();
          }
        });
      }

      function SetBold() {
        var CbName      = document.getElementById('NameCheckbox');
        var TxName      = document.getElementById('Name');
        if (CbName.checked) {
          TxName.setAttribute("class", "form-control border-bold");
        } else {
          TxName.setAttribute("class", "form-control");
        }

        var CbEmail     = document.getElementById('EmailCheckbox');
        var TxEmail     = document.getElementById('Email');
        if (CbEmail.checked) {
          TxEmail.setAttribute("class", "form-control border-bold");
        } else {
          TxEmail.setAttribute("class", "form-control");
        }

        var CbPhone     = document.getElementById('PhoneCheckbox');
        var TxPhone     = document.getElementById('Phone');
        if (CbPhone.checked) {
          TxPhone.setAttribute("class", "form-control border-bold");
        } else {
          TxPhone.setAttribute("class", "form-control");
        }

        var CbGender    = document.getElementById('GenderCheckbox');
        var TxGender1   = document.getElementById('Gender1');
        var TxGender2   = document.getElementById('Gender2');
        if (CbGender.checked) {
          TxGender1.checked = true;
          TxGender2.checked = true;
        } else {
          TxGender1.checked = false;
          TxGender2.checked = false;
        }

        var CbAddress   = document.getElementById('AddressCheckbox');
        var TxAddress   = document.getElementById('Address');
        if (CbAddress.checked) {
          TxAddress.setAttribute("class", "form-control border-bold");
        } else {
          TxAddress.setAttribute("class", "form-control");
        }

        var CbCompany   = document.getElementById('CompanyCheckbox');
        var TxCompany   = document.getElementById('Company');
        if (CbCompany.checked) {
          TxCompany.setAttribute("class", "form-control border-bold");
        } else {
          TxCompany.setAttribute("class", "form-control");
        }

        var CbAddresseesName   = document.getElementById('AddresseesNameCheckbox');
        var TxAddresseesName   = document.getElementById('AddresseesName');
        if (CbAddresseesName.checked) {
          TxAddresseesName.setAttribute("class", "form-control border-bold");
        } else {
          TxAddresseesName.setAttribute("class", "form-control");
        }

        var CbAddresseesPhone   = document.getElementById('AddresseesPhoneCheckbox');
        var TxAddresseesPhone   = document.getElementById('AddresseesPhone');
        if (CbAddresseesPhone.checked) {
          TxAddresseesPhone.setAttribute("class", "form-control border-bold");
        } else {
          TxAddresseesPhone.setAttribute("class", "form-control");
        }

        var CbGender    = document.getElementById('ArrivalDestinationCheckbox');
        var TxTujuan1   = document.getElementById('Tujuan1');
        var TxTujuan2   = document.getElementById('Tujuan2');
        var TxTujuan3   = document.getElementById('Tujuan3');
        var TxTujuan4   = document.getElementById('Tujuan4');
        var TxTujuan5   = document.getElementById('Tujuan5');
        if (CbGender.checked) {
          TxTujuan1.checked = true;
          TxTujuan2.checked = true;
          TxTujuan3.checked = true;
          TxTujuan4.checked = true;
          TxTujuan5.checked = true;
        } else {
          TxTujuan1.checked = false;
          TxTujuan2.checked = false;
          TxTujuan3.checked = false;
          TxTujuan4.checked = false;
          TxTujuan5.checked = false;
        }

        var CbNumberOfPersons   = document.getElementById('NumberOfPersonsCheckbox');
        var TxNumberOfPersons   = document.getElementById('NumberOfPersons');
        if (CbNumberOfPersons.checked) {
          TxNumberOfPersons.setAttribute("class", "form-control border-bold");
        } else {
          TxNumberOfPersons.setAttribute("class", "form-control");
        }
      }

      function LoadAllForm() {
        $.ajax({
          data: {
            "_token": "{{ csrf_token() }}"
          },
          url: "{{ route('form.show-all-form') }}",
          type: "POST",
          dataType: "JSON",
          beforeSend: function(data) {
            $("#loading").show();
          },
          success: function(data) {
            $("#loading").hide();

            $("#FormDataDiri").html(data.form_data_diri);
            $("#FormTujuan").html(data.form_tujuan);
            $("#FormSyaratDanKetentuan").html(data.form_syarat_ketentuan);

            if (data.data_diri.Gender == "Yes") {
              $("#Gender1").prop('checked', true);
              $("#Gender2").prop('checked', true);
            } else {
              $("#Gender1").prop('checked', false);
              $("#Gender2").prop('checked', false);
            }

            if (data.tujuan.All == "Yes") {
              $("#ActivatedTujuanAll").prop('checked', true);
              $("#FormTujuan").show();
            } else {
              $("#ActivatedTujuanAll").prop('checked', false);
              $("#FormTujuan").hide();
            }

            if (data.syarat_ketentuan.Activated == "Yes") {
              $("#ActivatedFormSK").prop('checked', true);
              $('#SyaratDanKetentuan').summernote('enable');
              $('#SyaratDanKetentuan').summernote('code', data.syarat_ketentuan.TermsAndConditions);
            } else {
              $("#ActivatedFormSK").prop('checked', false);
              $('#SyaratDanKetentuan').summernote('disable');
              $('#SyaratDanKetentuan').summernote('code', data.syarat_ketentuan.TermsAndConditions);
            }

            var CbTujuan    = data.tujuan.ArrivalDestination;
            var TxTujuan1   = document.getElementById('Tujuan1');
            var TxTujuan2   = document.getElementById('Tujuan2');
            var TxTujuan3   = document.getElementById('Tujuan3');
            var TxTujuan4   = document.getElementById('Tujuan4');
            var TxTujuan5   = document.getElementById('Tujuan5');
            if (CbTujuan == 'Yes') {
              TxTujuan1.checked = true;
              TxTujuan2.checked = true;
              TxTujuan3.checked = true;
              TxTujuan4.checked = true;
              TxTujuan5.checked = true;
            } else {
              TxTujuan1.checked = false;
              TxTujuan2.checked = false;
              TxTujuan3.checked = false;
              TxTujuan4.checked = false;
              TxTujuan5.checked = false;
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire(
              'Oops...',
              jqXHR.responseJSON.message,
              textStatus
            );
            $("#loading").hide();
          }
        });
      }

      $(document).ready(function () {
        $("#SyaratDanKetentuan").summernote({
          height: 100,
          toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'table', [ 'table' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
          ]
        });

        LoadAllForm();
      });
    </script>
  </body>
</html>