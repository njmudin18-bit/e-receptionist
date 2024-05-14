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
                    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                      <div class="row">
                        <div class="mb-3">
                          <label for="simpleinput" class="form-label">Name:</label>
                          {!! Form::text('name', null, array('placeholder' => 'Roles Name','class' => 'form-control')) !!}
                        </div>

                        <div class="mb-3">
                          <label for="simpleinput" class="form-label">Permissions:</label>
                          @foreach($permission as $value)
                          <div class="form-check mb-1">
                            {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'form-check-input')) }}
                            <label class="form-check-label" for="checkmeout0">{{ $value->name }}</label>
                          </div>
                          @endforeach
                        </div>

                        <div class="mb-3">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
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
  </body>
</html>