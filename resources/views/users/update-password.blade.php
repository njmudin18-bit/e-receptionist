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
                    <h4 class="header-title">{{ $SubTitle }}</h4>
                  </div>
                  <div class="card-body">
                    <form method="post" id="UpdatePasswordForm" class="form-horizontal">
                      <div class="row mb-3">
                        <label for="inputPassword3" class="col-3 col-form-label">Current Password</label>
                        <div class="col-9 form-group">
                          <div class="input-group input-group-merge">
                            <input type="password" id="CurrentPassword" name="CurrentPassword" class="form-control" minlength="7" maxlength="15" placeholder="Current password">
                            <div class="input-group-text" data-password="false">
                              <span class="password-eye"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputPassword3" class="col-3 col-form-label">New Password</label>
                        <div class="col-9 form-group">
                          <div class="input-group input-group-merge">
                            <input type="password" id="NewPassword" name="NewPassword" class="form-control" minlength="7" maxlength="15" placeholder="Your new password">
                            <div class="input-group-text" data-password="false">
                              <span class="password-eye"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputPassword5" class="col-3 col-form-label">Confirm New Password</label>
                        <div class="col-9 form-group">
                          <div class="input-group input-group-merge">
                            <input type="password" id="NewConfirmPassword" name="NewConfirmPassword" class="form-control" minlength="7" maxlength="15" placeholder="Please confirm once more">
                            <div class="input-group-text" data-password="false">
                              <span class="password-eye"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="justify-content-end row">
                        <div class="col-9">
                          <button type="button" onclick="UpdatePasswordAction()" id="ButtonUpdatePassword" name="ButtonUpdatePassword" class="btn btn-info">Update password</button>
                        </div>
                      </div>
                    </form>
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

    <!-- Vendor js -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- Datatables js -->
    <x-datatablejs></x-datatablejs>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/customs.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      function UpdatePasswordAction() {
        const CurrentPassword     = document.getElementById("CurrentPassword").value.trim();
        const NewPassword         = document.getElementById("NewPassword").value.trim();
        const NewConfirmPassword  = document.getElementById("NewConfirmPassword").value.trim();
        if (CurrentPassword == "" || NewPassword == "" || NewConfirmPassword == ""){
          Swal.fire({
            title: "Oops...",
            text: "Current password, new password and confirm new password is required",
            icon: "error"
          });

          return false;
        } else {
          if (NewPassword == NewConfirmPassword) {
            var formData = $('#UpdatePasswordForm').serializeArray();
            formData.push({ name: "_token", value: "{{ csrf_token() }}" });
            $.ajax({
              url : "{{ route('password.update-password') }}",
              type: "POST",
              data: formData,
              dataType: "JSON",
              beforeSend: function (params) {
                $("#loading").show();
              },
              success: function(data)
              {
                $("#loading").hide();
                Swal.fire({
                  title: capitalizeFirstLetter(data.status),
                  text: data.message,
                  icon: "success"
                });
                $('#UpdatePasswordForm')[0].reset();
                $('#ButtonUpdatePassword').text('Update password');
                $('#ButtonUpdatePassword').attr('disabled',false);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                let data = jqXHR.responseJSON;
                Swal.fire({
                  title: capitalizeFirstLetter(textStatus),
                  text: data.message,
                  icon: "error"
                });
                
                $("#loading").hide();
                $('#ButtonUpdatePassword').text('Update password');
                $('#ButtonUpdatePassword').attr('disabled',false);
              }
            });
          } else {
            Swal.fire({
              title: "Oops...",
              text: "Password and Confirm Password not match",
              icon: "error"
            });

            return false;
          }
        }
      }

      // $(function (e) {
			// 	$.validator.setDefaults({
			// 		submitHandler: UpdatePasswordAction
			// 	});
			// 	$('#UpdatePasswordForm').validate({
			// 		rules: {
			// 			NewPassword: {
			// 				required: true,
			// 				minlength: 7
			// 			},
			// 			NewConfirmPassword: {
			// 				required: true,
      //         equalTo: "#NewPassword"
			// 			}
			// 		},
			// 		errorElement: 'span',
			// 		errorPlacement: function (error, element) {
			// 			error.addClass('invalid-feedback');
			// 			element.closest('.form-group').append(error);
			// 		},
			// 		highlight: function (element, errorClass, validClass) {
			// 			$(element).addClass('is-invalid');
			// 		},
			// 		unhighlight: function (element, errorClass, validClass) {
			// 			$(element).removeClass('is-invalid');
			// 		}
			// 	});

			// 	function UpdatePasswordAction() {
			// 		var data = $("#UpdatePasswordForm").serialize();
      //     data.push({ name: "_token", value: "{{ csrf_token() }}" });

			// 		$.ajax({
			// 			type: "POST",
			// 			url: "{{ route('password.update-password') }}",
			// 			data: data,
			// 			beforeSend: function () {
			// 				$("#error").fadeOut();
			// 				$("#ButtonUpdatePassword").prop('disabled', true);
			// 				$("#ButtonUpdatePassword").html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Updating...');
			// 			},
			// 			success: function (response) {
      //         $("#ButtonUpdatePassword").prop('disabled', true);
			// 				$("#ButtonUpdatePassword").html('Update password');
			// 			}, 
      //       error: function (xhr, status, errorThrown) {
      //         $("#ButtonUpdatePassword").prop('disabled', false);
			// 				$("#ButtonUpdatePassword").html('Update password');

      //         Swal.fire({
      //           title: "Oops...",
      //           text: xhr.responseJSON.errors.email[0],
      //           icon: "info"
      //         });
      //       }
			// 		});
			// 		return false;
			// 	}
			// });

      $(document).ready(function () {
        $("#loading").hide();
      });
    </script>
  </body>
</html>