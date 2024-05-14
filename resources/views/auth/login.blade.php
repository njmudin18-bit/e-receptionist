<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Login | {{ config('appsproperties.APPS_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Login | {{ config('appsproperties.APPS_NAME') }}">
		<meta name="description" content="{{ config('appsproperties.APPS_DESCRIPTION') }}">
		<meta name="keywords" content="{{ config('appsproperties.APPS_KEYWORD') }}">
		<meta name="subject" content="{{ config('appsproperties.APPS_NAME') }}">
		<meta name="language" content="ID">
		<meta name="author" content="{{ config('appsproperties.APPS_AUTHOR') }}">
		<meta name="designer" content="{{ config('appsproperties.APPS_AUTHOR') }}">
		<meta name="copyright" content="{{ config('appsproperties.APPS_COPYRIGHT') }}">
		<meta name="url" content="{{ url('') }}">
		<meta name="identifier-URL" content="{{ url('') }}">
		<meta name="robots" content="index, follow" />
		<meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
		<meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
		<link rel="canonical" href="{{ url('') }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset(config('appsproperties.APPS_ICON')) }}">
    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  </head>
  <body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xxl-8 col-lg-10">
            <div class="card overflow-hidden">
              <div class="row g-0">
                <div class="col-lg-6 d-none d-lg-block p-2">
                  <img src="https://www.mpasscheckin.com/assets/images/sliders/mpass_11.webp" alt="" class="img-fluid rounded h-100">
                </div>
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <div class="auth-brand p-2 mt-4 text-center">
                      <a href="{{ url('') }}" class="logo-light">
                        <img src="{{ asset(config('appsproperties.APPS_LOGO')) }}" alt="logo" height="22">
                      </a>
                      <a href="{{ url('') }}" class="logo-dark">
                        <img src="{{ asset(config('appsproperties.APPS_LOGO')) }}" alt="dark logo" style="width: 40%;">
                      </a>
                    </div>
                    <div class="p-4">
                      <h4 class="fs-20 text-center">Sign In</h4>
                      <p class="text-muted mb-3 text-center">Enter your email address and password to access
                        account.
                      </p>

                      <!-- form -->
                      <form method="POST" id="login_form">
                        @csrf
                        <div class="mb-3 form-group">
                          <label for="emailaddress" class="form-label">Email address</label>
                          <input id="email" type="email" value="admin@gmail.com" maxlength="25" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="Enter your email" required autofocus>

                          @error('email')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="mb-3 form-group">
                          <a href="#" class="text-muted float-end">
                            <small>Forgot your password?</small>
                          </a>
                          <label for="password" class="form-label">Password</label>
                          <div class="input-group input-group-merge">
                            <input id="password" type="password" value="" maxlength="25" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off" placeholder="Enter your password" required>
                            <div class="input-group-text" data-password="false">
                              <span class="password-eye"></span>
                            </div>
                          </div>

                          @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                          </div>
                        </div>
                        <div class="mb-0 text-start">
                          <button class="btn btn-soft-primary w-100" id="button_login" type="submit">
                            <i class="ri-login-circle-fill me-1"></i> 
                            <span class="fw-bold">Log In</span> 
                          </button>
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
            <p class="text-dark-emphasis">Don't have an account? 
              <a href="#" class="text-dark fw-bold ms-1 link-offset-3 text-decoration-underline"><b>Sign up</b></a>
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
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
			$(function () {
				$.validator.setDefaults({
					submitHandler: loginAction
				});
				$('#login_form').validate({
					rules: {
						email: {
							required: true,
              email: true,
							minlength: 4,
						},
						password: {
							required: true,
							minlength: 5
						}
					},
					errorElement: 'span',
					errorPlacement: function (error, element) {
						error.addClass('invalid-feedback');
						element.closest('.form-group').append(error);
					},
					highlight: function (element, errorClass, validClass) {
						$(element).addClass('is-invalid');
					},
					unhighlight: function (element, errorClass, validClass) {
						$(element).removeClass('is-invalid');
					}
				});

				function loginAction() {
					var data = $("#login_form").serialize();
					$.ajax({
						type: "POST",
						url: "{{ route('login') }}",
						data: data,
						beforeSend: function () {
							$("#error").fadeOut();
							$("#button_login").prop('disabled', true);
							$("#button_login").html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Loading...');
						},
						success: function (response) {
              $("#button_login").prop('disabled', true);
							$("#button_login").html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Masuk aplikasi...');

              const Urls = "{{ url('') }}";
              location.replace(Urls);
						}, 
            error: function (xhr, status, errorThrown) {
              $("#button_login").prop('disabled', false);
							$("#button_login").html('<i class="ri-login-circle-fill me-1"></i> <span class="fw-bold">Log In</span>');

              Swal.fire({
                title: "Oops...",
                text: xhr.responseJSON.errors.email[0],
                icon: "info"
              });
            }
					});
					return false;
				}
			});
		</script>
  </body>
</html>