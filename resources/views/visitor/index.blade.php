
<!doctype html>
<html lang="en">
  <head>
    <title>{{ $SubTitle }} | {{ config('appsproperties.APPS_NAME') }}</title>
    <meta charset="UTF-8">
    <!-- Meta Name -->
    <x-metas :subtitle="$SubTitle"></x-metas>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- Bootrap for the demo page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Animate CSS for the css animation support if needed -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
    <!-- Include SmartWizard CSS -->
    <link href="{{ asset('wizards/jquery-smart-wizard/css/demo.css') }}" rel="stylesheet" type="text/css" />
    <!-- Demo files -->
    <link href="{{ asset('wizards/jquery-smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>
      body {
        background-image: url('https://4kwallpapers.com/images/walls/thumbs_3t/3161.png');
        background-repeat: no-repeat;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
      }

      .sw>.tab-content {
        background-color: #fff;
      }

      .sw .toolbar {
        background-color: #fff;
      }

      .was-validated .valid-feedback {
        font-size: 11px;
      }

      .was-validated :invalid~.invalid-feedback {
        font-style: italic;
        font-size: 11px;
      }

      .footer span {
        font-size: 12px;
      }

      .swal2-container .swal2-html-container {
        font-size: 15px;
      }

      ol li {
        line-height: 25px;
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <!-- Navbar Visitor -->
    <x-navbar-visitor></x-navbar-visitor>
    <br><br>
    <div class="container mt-5">
      <div class="fixed-plugin">
        <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
          <i class="bi-gear-fill"></i>
        </button>
      </div>

      <div class="mb-5 border-bottom">
        <!-- <button class="btn btn-primary btn-sm float-end mt-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
          Settings
        </button> -->
        
        <div class="float-end text-white me-3 mt-2">
          Step number: <span id="sw-current-step"></span> of <span id="sw-total-step"></span>
        </div>

        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Smart Wizard Settings</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
                
            <div class="mb-2">
              <label for="theme_selector" class="form-label">Theme</label>
              <select id="theme_selector" class="form-select form-select-sm" aria-label="">
                <option value="basic">Basic (Default)</option>
                <option value="arrows" selected>Arrows</option>
                <option value="square">Square</option>
                <option value="round">Round</option>
                <option value="dots">Dots</option>
              </select>
              <div class="form-check form-check-inline ">
                <input class="form-check-input align-middle option-setting-checkbox" type="checkbox" id="is_justified" value="1" checked>
                <label class="form-check-label align-middle" for="is_justified">Justified</label>
              </div>
            </div>

            <div class="mb-2">
              <label for="animation" class="form-label">Transition</label>
                <select id="animation" class="form-select form-select-sm" aria-label="">
                  <optgroup label="Buit-in Animations">
                    <option value="none">None</option>
                    <option value="fade">Fade</option>
                    <option value="slideHorizontal" selected>Slide Horizontal</option>
                    <option value="slideVertical">Slide Vertical</option>
                    <option value="slideSwing">Slide Swing</option>
                  </optgroup>
                  <optgroup label="CSS Animations (External Plugin)">
                    <option value="cssSlideH">Slide Horizontal</option>
                    <option value="cssSlideV">Slide Vertical</option>
                    <option value="cssFade">Fade</option>
                    <option value="cssFadeSlideH">Fade + Slide Horizontal</option>
                    <option value="cssFadeSlideV">Fade + Slide Vertical</option>
                    <option value="cssFadeSlideCorner1">Fade + Slide Corner 1</option>
                    <option value="cssFadeSlideCorner2">Fade + Slide Corner 2</option>
                    <option value="cssBounce">Bounce</option>
                    <option value="cssBounceSlideH">Bounce + Slide Horizontal</option>
                    <option value="cssBounceSlideV">Bounce + Slide Vertical</option>
                    <option value="cssBackSlideH">Back + Slide Horizontal</option>
                    <option value="cssBackSlideV">Back + Slide Vertical</option>
                    <option value="cssFlipH">Flip Horizontal</option>
                    <option value="cssFlipV">Flip Vertical</option>
                    <option value="cssLightspeed">Lightspeed</option>
                    <option value="cssRotate">Rotate</option>
                    <option value="cssRotateClock">Rotate Clockwise</option>
                    <option value="cssRotateAntiClock">Rotate Anti Clockwise</option>
                    <option value="cssZoom">Zoom</option>
                  </optgroup>
                </select>
            </div>

            <div class="mb-2">
              <label for="theme_colors" class="form-label">Colors</label>
              <select id="theme_colors" class="form-select form-select-sm" aria-label="">
                <!-- <option value="custom" selected>Custom</option> -->
              </select>
            </div>
            <fieldset class="mb-2" style="display: none;" id="color-list">
              <!-- <legend class="col-form-label col-sm-2 col-form-label">Colors</legend> -->
            </fieldset>
              <!-- </div>
              
            <div class="col"> -->
            <div class="mb-2">
              <h6 for="Anchor" class="form-label border-bottom">Anchor Settings</h6>
              <div class="form-check">
                <input class="form-check-input align-middle option-setting-checkbox" type="checkbox" id="anchor_navigation" value="1" checked>
                <label class="form-check-label align-middle" for="anchor_navigation">Enable Navigation</label>
              </div>
              <div class="form-check">
                <input class="form-check-input align-middle option-setting-checkbox" type="checkbox" id="enableNavigationAlways" value="1">
                <label class="form-check-label align-middle" for="enableNavigationAlways">Enable Navigation Always</label>
              </div>
              <div class="form-check">
                <input class="form-check-input align-middle option-setting-checkbox" type="checkbox" id="enableDoneState" value="1" checked>
                <label class="form-check-label align-middle" for="enableDoneState">Enable Done State</label>
              </div>
              <div class="form-check">
                <input class="form-check-input align-middle option-setting-checkbox" type="checkbox" id="unDoneOnBackNavigation" value="1">
                <label class="form-check-label align-middle" for="unDoneOnBackNavigation">Undone On Back Navigation</label>
              </div>
              <div class="form-check">
                <input class="form-check-input align-middle option-setting-checkbox" type="checkbox" id="enableDoneStateNavigation" value="1" checked>
                <label class="form-check-label align-middle" for="enableDoneStateNavigation">Enable Done State Navigation</label>
              </div>
            </div>

            <div class="mb-2">
              <h6 for="Toolbar" class="form-label border-bottom">Toolbar Settings</h6>
              <label class="form-check-label align-middle-">Position: </label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="toolbar-position" id="toolbar-position-none" value="none">
                <label class="form-check-label" for="toolbar-position-none">none</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="toolbar-position" id="toolbar-position-top" value="top">
                <label class="form-check-label" for="toolbar-position-top">top</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="toolbar-position" id="toolbar-position-bottom" value="bottom">
                <label class="form-check-label" for="toolbar-position-bottom">bottom</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="toolbar-position" id="toolbar-position-both" value="both" checked>
                <label class="form-check-label" for="toolbar-position-both">both</label>
              </div>
              
              <div class="form-check">
                <input class="form-check-input align-middle option-setting-checkbox" type="checkbox" id="toolbar-showNextButton" value="1" checked>
                <label class="form-check-label align-middle" for="toolbar-showNextButton">Show Next Button</label>
              </div>
              <div class="form-check">
                <input class="form-check-input align-middle option-setting-checkbox" type="checkbox" id="toolbar-showPreviousButton" value="1" checked>
                <label class="form-check-label align-middle" for="toolbar-showPreviousButton">Show Previous Button</label>
              </div>
            </div>

            <div class="mb-2">
              <h6 for="Other" class="form-label border-bottom">Other Settings</h6>
              <div class="form-check">
                <input class="form-check-input align-middle option-setting-checkbox" type="checkbox" id="key_navigation" value="1" checked>
                <label class="form-check-label align-middle" for="key_navigation">Keyboard Navigation</label>
              </div>

              <div class="form-check">
                <input class="form-check-input align-middle option-setting-checkbox" type="checkbox" id="back_button_support" value="1" checked>
                <label class="form-check-label align-middle" for="back_button_support">Back Button Support</label>
              </div>

              <div class="form-check">
                <input class="form-check-input align-middle option-setting-checkbox" type="checkbox" id="autoAdjustHeight" value="1" checked>
                <label class="form-check-label align-middle" for="autoAdjustHeight">Auto Adjust Height</label>
              </div>
            </div>

            <div class="mb-2">
              <h6 for="theme_selector" class="form-label border-bottom">External Controls</h6>
              <button class="btn btn-secondary btn-sm" id="prev-btn" type="button">Previous</button>
              <button class="btn btn-secondary btn-sm" id="next-btn" type="button">Next</button>
              <button class="btn btn-danger btn-sm" id="reset-btn" type="button">Reset</button>
            
              <div class="input-group input-group-sm mt-2">
                <select class="form-select" id="got_to_step" aria-label="Select step number">
                  <option selected>Choose step...</option>
                  <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                
                <button class="btn btn-primary" id="btn-go-to" type="button">Go</button>
                <button class="btn btn-warning" id="btn-go-to-forced" type="button">Force Go</button>
              </div>
            </div>

            <div class="mb-2">
              <h6 for="theme_selector" class="form-label border-bottom">State</h6>
              <div class="input-group input-group-sm mt-2">
                <select class="form-select" id="state_step_selection" aria-label="Select step number">
                  <option selected>Choose step...</option>
                  <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>

                <select class="form-select" id="state_selection" aria-label="Select state">
                  <option selected>Choose state...</option>
                  <option value="default">default</option>
                    <option value="active">active</option>
                    <option value="done">done</option>
                    <option value="disable">disable</option>
                    <option value="hidden">hidden</option>
                    <option value="error">error</option>
                    <option value="warning">warning</option>
                </select>

                <button class="btn btn-success" id="btn-state-set" type="button">Set</button>
                <button class="btn btn-danger" id="btn-state-unset" type="button">Unset</button>
              </div>
            </div>
        
          </div>
        </div>
      </div>

      <!-- SmartWizard html -->
      <div id="smartwizard" dir="rtl-" class="mt-5">
        <ul class="nav nav-progress">
          <li class="nav-item">
            <a class="nav-link" href="#step-1">
              <div class="num">1</div>
              Data Diri
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#step-2">
              <span class="num">2</span>
              Tujuan Kedatangan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#step-3">
              <span class="num">3</span>
              Syarat dan Ketentuan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#step-4">
              <span class="num">4</span>
              Konfirmasi
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
            <form id="form-1" class="row row-cols-1 ms-2 me-2 needs-validation" novalidate>
              <div class="col">
                <div class="mb-3 text-muted">Cantumkan data diri anda sesuai dengan form dibawah ini.</div>
              </div>

              @if($DataDiri->VisitorName == 'Yes')
              <div class="col mb-3">
                <label for="first-name" class="form-label">Nama anda</label>
                <!-- <input type="text" class="form-control" id="first-name" value="" required> -->
                <input type="text" id="VisitorName" name="VisitorName" class="form-control text-capitalize" placeholder="Contoh: John Doe" minlength="5" maxlength="75" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Harap cantumkan nama anda.
                </div>
              </div>
              @endif

              @if($DataDiri->Email == 'Yes')
              <div class="col mb-3">
                <label for="validationCustom02" class="form-label">Email</label>
                <input type="email" id="VisitorEmail" name="VisitorEmail" class="form-control text-lowercase" placeholder="Contoh: john.doe@omas-mfg.com" maxlength="75" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Harap cantumkan email anda.
                </div>
              </div>
              @endif

              @if($DataDiri->Phone == 'Yes')
              <div class="col mb-3">
                <label for="first-name" class="form-label">Telepon</label>
                <input type="phone" id="VisitorPhone" name="VisitorPhone" class="form-control" placeholder="Contoh: +62 8XX 1XXX 2XXX" minlength="8" maxlength="18" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Harap cantumkan no telepon anda.
                </div>
              </div>
              @endif

              @if($DataDiri->Gender == 'Yes')
              <div class="col mb-3">
                <label for="first-name" class="form-label">Jenis kelamin</label>
                <select name="VisitorGender" id="VisitorGender" class="gender form-select" required>
                  <option selected disabled value="">-- Pilih --</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Harap pilih jenis kelamin anda.
                </div>
              </div>
              @endif

              @if($DataDiri->Address == 'Yes')
              <div class="col mb-3">
                <label for="first-name" class="form-label">Alamat</label>
                <input type="text" id="VisitorAddress" name="VisitorAddress" class="form-control" placeholder="Contoh: Kp. Cibadak, Bojong, Cikupa, Kab. Tangerang, Banten." maxlength="250" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Harap cantumkan alamat anda.
                </div>
              </div>
              @endif

              @if($DataDiri->Company == 'Yes')
              <div class="col mb-3">
                <label for="first-name" class="form-label">Perusahaan</label>
                <input type="text" id="VisitorCompany" name="VisitorCompany" class="form-control text-capitalize" placeholder="Contoh: PT. XXX XXXX" maxlength="75" minlength="5" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Harap cantumkan nama perusahaan anda.
                </div>
              </div>
              @endif
            </form>
          </div>
          <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
            <form id="form-2" class="row row-cols-1 ms-2 me-2 needs-validation" novalidate>
              <div class="col">
                <div class="mb-3 text-muted">Isi tujuan kedatangan anda disini.</div>
              </div>

              @if($Tujuan->AddresseesName == 'Yes')
              <div class="col mb-3">
                <label for="first-name" class="form-label">Nama orang yang dituju</label>
                <input type="text" id="AddresseesName" name="AddresseesName" class="form-control text-capitalize" placeholder="Contoh: John Doe" minlength="3" maxlength="75" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Harap cantumkan nama orang yang dituju.
                </div>
              </div>
              @endif

              @if($Tujuan->AddresseesPhone == 'Yes')
              <div class="col mb-3">
                <label for="first-name" class="form-label">Nomor telepon orang yang dituju</label>
                <input type="text" id="AddresseesPhone" name="AddresseesPhone" class="form-control" placeholder="Contoh: +62 8XX 1XXX 2XXX" minlength="7" maxlength="25" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Harap cantumkan no telepon orang yang anda tuju.
                </div>
              </div>
              @endif

              @if($Tujuan->DepartmentDestination == 'Yes')
              <div class="col mb-3">
                <label for="first-name" class="form-label">Department tujuan</label>
                <select name="DepartmentDestination" id="DepartmentDestination" class="form-control" required>
                  <option selected disabled value="">-- Pilih --</option>
                  <option value="Accounting">Accounting</option>
                  <option value="Finance">Finance</option>
                  <option value="HRD">HRD</option>
                  <option value="IT">IT</option>
                  <option value="Maintenance">Maintenance</option>
                  <option value="Produksi">Produksi</option>
                  <option value="Sales">Sales</option>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Harap pilih department tujuan.
                </div>
              </div>
              @endif

              @if($Tujuan->ArrivalDestination == 'Yes')
              <div class="col mb-3">
                <label for="first-name" class="form-label">Tujuan kedatangan</label>
                <select name="ArrivalDestination" id="ArrivalDestination" class="form-control" required>
                  <option selected disabled value="">-- Pilih --</option>
                  <option value="Pertemuan">Pertemuan</option>
                  <option value="Wawancara & Psikotest">Wawancara & Psikotest</option>
                  <option value="Mengirim Paket">Mengirim Paket</option>
                  <option value="Hari Pertama Bekerja">Hari Pertama Bekerja</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Harap pilih tujuan kedatangan.
                </div>
              </div>
              @endif

              @if($Tujuan->NumberOfPersons == 'Yes')
              <div class="col mb-3">
                <label for="first-name" class="form-label">Berapa banyak orang yang bersama anda</label>
                <input type="number" id="NumberOfPersons" name="NumberOfPersons" class="form-control" placeholder="Contoh: 5" maxlength="2" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <div class="invalid-feedback">
                  Harap cantumkan banyaknya orang yang bersama anda.
                </div>
              </div>
              @endif
            </form>
          </div>
          <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
            <form id="form-3" class="row row-cols-1 ms-2 me-2 needs-validation" novalidate>
              @if($Syaratketentuan->Activated == 'Yes')
              <div class="col">
                <div class="mb-3 text-muted">Baca dan pahami syarat dan ketentuan memasuki area perusahaan.</div>
              </div>
              <div class="col mb-3">
                {!! $Syaratketentuan->TermsAndConditions !!}
              </div>
              <div class="col mb-3">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="TermsAndConditions" name="TermsAndConditions" required>
                  <label class="form-check-label" for="exampleCheck1">Syarat dan Ketentuan</label>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Harap ceklis syarat dan ketentuan.
                  </div>
                </div>
              </div>
              @endif
            </form>  
          </div>
          <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
            <form id="form-4" class="row row-cols-1 ms-2 me-2 needs-validation" novalidate>
              <div class="col">
                <div class="mb-3 text-muted">Harap konfirmasi sekali lagi data diri dan tujuan kedatangan Anda</div>
                
                <h4 class="mb-3-">Data Diri</h4>
                <hr class="my-2">
                <div class="row g-3 align-items-center">
                  @if($DataDiri->VisitorName == 'Yes')
                  <div class="col-md-2 col-sm-12">
                    <label class="col-form-label text-muted">Nama <span class="float-end"> :</span></label>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <span id="VisitorNameLabel" class="form-text-"></span>
                  </div>
                  @endif

                  @if($DataDiri->Email == 'Yes')
                  <div class="col-md-2 col-sm-12">
                    <label class="col-form-label text-muted">Email <span class="float-end"> :</span></label>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <span id="VisitorEmailLabel" class="form-text-"></span>
                  </div>
                  @endif

                  @if($DataDiri->Phone == 'Yes')
                  <div class="col-md-2 col-sm-12">
                    <label class="col-form-label text-muted">Telepon <span class="float-end"> :</span></label>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <span id="VisitorPhoneLabel" class="form-text-"></span>
                  </div>
                  @endif

                  @if($DataDiri->Gender == 'Yes')
                  <div class="col-md-2 col-sm-12">
                    <label class="col-form-label text-muted">Jenis kelamin <span class="float-end"> :</span></label>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <span id="VisitorGenderLabel" class="form-text-"></span>
                  </div>
                  @endif

                  @if($DataDiri->Company == 'Yes')
                  <div class="col-md-2 col-sm-12">
                    <label class="col-form-label text-muted">Perusahaan <span class="float-end"> :</span></label>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <span id="VisitorCompanyLabel" class="form-text-"></span>
                  </div>
                  @endif

                  @if($DataDiri->Address == 'Yes')
                  <div class="col-md-2 col-sm-12">
                    <label class="col-form-label text-muted">Alamat <span class="float-end"> :</span></label>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <span id="VisitorAddressLabel" class="form-text-"></span>
                  </div>
                  @endif
                </div>
      
                <h4 class="mt-3 mb-3">Tujuan Kedatangan</h4>
                <hr class="my-2">
                <div class="row g-3 align-items-center">
                  @if($Tujuan->AddresseesName == 'Yes')
                  <div class="col-md-2 col-sm-12">
                    <label class="col-form-label text-muted">Bertemu <span class="float-end"> :</span></label>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <span id="AddresseesNameLabel" class="form-text-"></span>
                  </div>
                  @endif

                  @if($Tujuan->AddresseesPhone == 'Yes')
                  <div class="col-md-2 col-sm-12">
                    <label class="col-form-label text-muted">Telepon <span class="float-end"> :</span></label>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <span id="AddresseesPhoneLabel" class="form-text-"></span>
                  </div>
                  @endif

                  @if($Tujuan->DepartmentDestination == 'Yes')
                  <div class="col-md-2 col-sm-12">
                    <label class="col-form-label text-muted">Department <span class="float-end"> :</span></label>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <span id="DepartmentDestinationLabel" class="form-text-"></span>
                  </div>
                  @endif

                  @if($Tujuan->ArrivalDestination == 'Yes')
                  <div class="col-md-2 col-sm-12">
                    <label class="col-form-label text-muted">Tujuan <span class="float-end"> :</span></label>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <span id="ArrivalDestinationLabel" class="form-text-1"></span>
                  </div>
                  @endif

                  @if($Tujuan->NumberOfPersons == 'Yes')
                  <div class="col-md-2 col-sm-12">
                    <label class="col-form-label text-muted">Banyaknya orang <span class="float-end"> :</span></label>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <span id="NumberOfPersonsLabel" class="form-text-"></span>
                  </div>
                  @endif
                </div>

                <h4 class="mt-3 mb-3">Syarat dan Ketentuan</h4>
                <hr class="my-2">
                <div class="row g-3 align-items-center">
                  @if($Tujuan->AddresseesName == 'Yes')
                  <div class="col-md-4 col-sm-12">
                    <label class="col-form-label text-muted">Syarat dan Ketentuan <span class="float-end"> :</span></label>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <span id="TermsAndConditionsLabel" class="form-text-"></span>
                  </div>
                  @endif
                </div>
                <div class="row g-3 mb-3 mt-3">
                  <div class="col">
                    <input type="hidden" name="Devices" id="Devices" value="{{ $Devices }}">
                    <input type="hidden" name="Tickets" id="Tickets" value="{{ $Tickets }}">
                    <input type="hidden" name="CheckinDate" id="CheckinDate" value="{{ date('Y-m-d H:i:s') }}">
                    <input type="hidden" name="CheckoutDate" id="CheckoutDate" value="">
                    <input type="hidden" name="CheckoutDateLimit" id="CheckoutDateLimit" value="{{ $CheckoutDateLimit }}">
                    <input type="hidden" name="CheckoutBy" id="CheckoutBy" value="">
                    <input type="hidden" name="Status" id="Status" value="In">
                    <input type="checkbox" class="form-check-input" id="SaveInfo" name="SaveInfo" required>
                    <label class="form-check-label" for="save-info">Semua data saya sudah sesuai.</label>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Harap ceklis!
                    </div>
                  </div>
                </div>
                <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
              </div>
            </form>
          </div>
        </div>

        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>

      <br /> &nbsp;
    </div>
    
    <!-- Navbar Visitor -->
    <x-footer-visitor></x-footer-visitor>

    <!-- Confirm Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmModalLabel">Order Placed</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Congratulations! Your order is placed.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="closeModal()">Ok, close and reset</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Loader -->
    <x-loader></x-loader>

    <!-- Bootrap for the demo page -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- jQuery Slim 3.6  -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> -->

    <!-- Include SmartWizard JavaScript source -->
    <script src="{{ asset('wizards/jquery-smart-wizard/js/jquery.smartWizard.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('wizards/jquery-smart-wizard/js/demo.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/customs.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script type="text/javascript">
      const myModal = new bootstrap.Modal(document.getElementById('confirmModal'));
      
      function onCancel() { 
        // Reset wizard
        $('#smartwizard').smartWizard("reset");

        // Reset form
        document.getElementById("form-1").reset();
        document.getElementById("form-2").reset();
        document.getElementById("form-3").reset();
        document.getElementById("form-4").reset();
      }

      function onConfirm() {
        var isMobile = {
          Android: function() {
              return navigator.userAgent.match(/Android/i);
          },
          BlackBerry: function() {
              return navigator.userAgent.match(/BlackBerry/i);
          },
          iOS: function() {
              return navigator.userAgent.match(/iPhone|iPad|iPod/i);
          },
          Opera: function() {
              return navigator.userAgent.match(/Opera Mini/i);
          },
          Windows: function() {
              return navigator.userAgent.match(/IEMobile/i);
          },
          any: function() {
              return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
          }
        };

        let form = document.getElementById('form-4');
        if (form) {
          if (!form.checkValidity()) {
            form.classList.add('was-validated');
            $('#smartwizard').smartWizard("setState", [3], 'error');
            $("#smartwizard").smartWizard('fixHeight');
            return false;
          }
          
          Swal.fire({
            title: "Kirim permintaan?",
            text: "Permintaan anda akan dikirimkan ke department terkait!",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Kirim!",
            cancelButtonText: "Batal, cek lagi"
          }).then((result) => {
            if (result.isConfirmed) {
              var formData = $('#form-1, #form-2, #form-3, #form-4').serializeArray();
              formData.push({ name: "_token", value: "{{ csrf_token() }}" });
              $.ajax({
                url : "{{ route('visitor.send-data-diri') }}",
                type: "POST",
                data: formData,
                dataType: "JSON",
                beforeSend: function (params) {
                  $("#loading").show();
                },
                success: function(data)
                {
                  //console.log(data);
                  grecaptcha.reset();
                  $("#loading").hide();
                  window.open(data.url, '_blank');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                  grecaptcha.reset();
                  $("#loading").hide();
                  let ErrorResaponses = jqXHR.responseJSON;
                  //console.log(ErrorResaponses.errors["g-recaptcha-response"][0]);
                  if (jqXHR.status == 422) {
                    //ErrorResaponses.errors["g-recaptcha-response"][0]
                    Swal.fire({
                      title: capitalizeFirstLetter(textStatus + " " + jqXHR.status),
                      text: "Harap ceklis I'm not a robot",
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

          //myModal.show();
        }
      }

      function closeModal() {
        // Reset wizard
        $('#smartwizard').smartWizard("reset");

        // Reset form
        document.getElementById("form-1").reset();
        document.getElementById("form-2").reset();
        document.getElementById("form-3").reset();
        document.getElementById("form-4").reset();

        myModal.hide();
      }

      function showConfirm() {
        const VisitorName     = $('#VisitorName').val();
        const VisitorEmail    = $('#VisitorEmail').val();
        const VisitorPhone    = $('#VisitorPhone').val();
        const VisitorAddress  = $('#VisitorAddress').val();
        const VisitorGender   = $('#VisitorGender').val();
        const VisitorCompany  = $('#VisitorCompany').val();

        const AddresseesName          = $('#AddresseesName').val();
        const AddresseesPhone         = $('#AddresseesPhone').val();
        const DepartmentDestination   = $('#DepartmentDestination').val();
        const ArrivalDestination      = $('#ArrivalDestination').val();
        const NumberOfPersons         = $('#NumberOfPersons').val();

        const TermsAndConditions      = $('#TermsAndConditions').val();

        $("#VisitorNameLabel").html(VisitorName);
        $("#VisitorEmailLabel").html(VisitorEmail);
        $("#VisitorPhoneLabel").html(VisitorPhone);
        $("#VisitorAddressLabel").html(VisitorAddress);
        $("#VisitorGenderLabel").html(VisitorGender == 'L' ? 'Laki-laki' : 'Perempuan');
        $("#VisitorCompanyLabel").html(VisitorCompany);

        $("#AddresseesNameLabel").html(AddresseesName);
        $("#AddresseesPhoneLabel").html(AddresseesPhone);
        $("#DepartmentDestinationLabel").html(DepartmentDestination);
        $("#ArrivalDestinationLabel").html(ArrivalDestination);
        $("#NumberOfPersonsLabel").html(NumberOfPersons);

        $("#TermsAndConditionsLabel").html(TermsAndConditions == 'on' ? 'Setuju' : 'Tidak');

        $('#smartwizard').smartWizard("fixHeight"); 
      }

      $(function() {
        // Leave step event is used for validating the forms
        $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIdx, nextStepIdx, stepDirection) {
          // Validate only on forward movement  
          if (stepDirection == 'forward') {
            let form = document.getElementById('form-' + (currentStepIdx + 1));
            if (form) {
              if (!form.checkValidity()) {
                form.classList.add('was-validated');
                $('#smartwizard').smartWizard("setState", [currentStepIdx], 'error');
                $("#smartwizard").smartWizard('fixHeight');
                return false;
              }
              $('#smartwizard').smartWizard("unsetState", [currentStepIdx], 'error');
            }
          }
        });

        // Step show event
        $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
            $("#prev-btn").removeClass('disabled').prop('disabled', false);
            $("#next-btn").removeClass('disabled').prop('disabled', false);
            if(stepPosition === 'first') {
                $("#prev-btn").addClass('disabled').prop('disabled', true);
            } else if(stepPosition === 'last') {
                $("#next-btn").addClass('disabled').prop('disabled', true);
            } else {
                $("#prev-btn").removeClass('disabled').prop('disabled', false);
                $("#next-btn").removeClass('disabled').prop('disabled', false);
            }

            // Get step info from Smart Wizard
            let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
            $("#sw-current-step").text(stepInfo.currentStep + 1);
            $("#sw-total-step").text(stepInfo.totalSteps);

            if (stepPosition == 'last') {
              showConfirm();
              $("#btnFinish").prop('disabled', false);
            } else {
              $("#btnFinish").prop('disabled', true);
            }

            // Focus first name
            if (stepIndex == 1) {
              setTimeout(() => {
                $('#first-name').focus();
              }, 0);
            }
        });

        // Smart Wizard
        $('#smartwizard').smartWizard({
            selected: 0,
            // autoAdjustHeight: false,
            theme: 'arrows', // basic, arrows, square, round, dots
            transition: {
              animation:'none'
            },
            toolbar: {
              showNextButton: true, // show/hide a Next button
              showPreviousButton: true, // show/hide a Previous button
              position: 'bottom', // none/ top/ both bottom
              extraHtml: `<button class="btn btn-success" id="btnFinish" onclick="onConfirm()">Send</button>`
              // extraHtml: `<button class="btn btn-success" id="btnFinish" onclick="onConfirm()">Send</button>
              //             <button class="btn btn-danger" id="btnCancel" onclick="onCancel()">Cancel</button>`
            },
            anchor: {
                enableNavigation: true, // Enable/Disable anchor navigation 
                enableNavigationAlways: false, // Activates all anchors clickable always
                enableDoneState: true, // Add done state on visited steps
                markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
                enableDoneStateNavigation: true // Enable/Disable the done state navigation
            },
        });

        $("#state_selector").on("change", function() {
          $('#smartwizard').smartWizard("setState", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
          
          return true;
        });

        $("#style_selector").on("change", function() {
          $('#smartwizard').smartWizard("setStyle", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
          
          return true;
        });
      });

      $(document).ready(function() {
        $("#loading").hide();
      });
    </script>
  </body>
</html>
