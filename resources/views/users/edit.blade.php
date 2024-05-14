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
                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                      <div class="mb-3">
                        <label for="simpleinput" class="form-label">Name:</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) !!}
                      </div>
                      <div class="mb-3">
                        <label for="simpleinput" class="form-label">Email:</label>
                        {!! Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) !!}
                      </div>

                      @if(Auth::user()->id == $user->id)
                      <div class="mb-3">
                        <label for="simpleinput" class="form-label">Password:</label>
                        {!! Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) !!}
                      </div>
                      <div class="mb-3">
                        <label for="simpleinput" class="form-label">Confirm Password:</label>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password', 'class' => 'form-control')) !!}
                      </div>
                      @endif

                      <div class="mb-3">
                        <label for="simpleinput" class="form-label">Role:</label>
                        @if(Auth::user()->can('user-create'))
                          {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control', 'multiple')) !!}
                        @else
                          {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control', 'multiple', 'readonly')) !!}
                        @endif
                      </div>

                      <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>

                    {!! Form::close() !!}
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

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- Datatables js -->
    <x-datatablejs></x-datatablejs>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/customs.js') }}"></script>
    
    <script>
      var save_method;
      var url;

      function save(params) {
        var url;
        if(save_method == 'add') {
          url = "{{ route('permissions.store') }}";
        } else {
          url = "{{ route('permissions.updated') }}";
        }

        var formData = $('#registerForm').serializeArray();
        formData.push({ name: "_token", value: "{{ csrf_token() }}" });
        $.ajax({
          url : url,
          type: "POST",
          data: formData,
          dataType: "JSON",
          beforeSend: function (params) {
            $("#loading").show();
          },
          success: function(data)
          {
            reload_table();
            $("#loading").hide();
            $('#modalForm').modal('hide');
            $('#btnSave').text('Save');
            $('#btnSave').attr('disabled',false);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            let data = jqXHR.responseJSON;
            if (data.status_code == 500) {
              for (var i = 0; i < data.inputerror.length; i++) 
              {
                $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error');
                $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
              }
            } else {
              Swal.fire({
                title: capitalizeFirstLetter(textStatus),
                text: data.message,
                icon: "error"
              });
            }
            $("#loading").hide();
            $('#btnSave').text('Save');
            $('#btnSave').attr('disabled',false);
          }
        });
      }
    </script>
  </body>
</html>