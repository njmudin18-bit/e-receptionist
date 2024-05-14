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
                    <h4 class="header-title">
                      {{ $SubTitle }} Management
                      <span class="float-end">
                        <button type="button" onclick="openModal()" class="btn btn-danger">Tambah Data</button>
                      </span>
                    </h4>
                  </div>
                  <div class="card-body">
                    <table id="table-data" class="table table-striped table-bordered dt-responsive nowrap w-100" width="100%">
                      <thead>
                        <tr class="bg-primary">
                          <th class="text-white text-center" width="5%">No</th>
                          <th class="text-white text-center" width="10%">
                            <i class="ri-settings-3-line"></i>
                          </th>
                          <th class="text-white text-center">Username</th>
                          <th class="text-white text-center">Email</th>
                          <th class="text-white text-center">Roles</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
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

    <!-- Modal -->
    <div class="modal fade" id="modalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header modal-colored-header bg-primary">
            <h4 class="modal-title" id="primary-header-modalLabel">Modal Heading</h4>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="registerForm">
              <input type="hidden" name="kode" id="kode">
              <div class="mb-3">
                <label for="recipient-name" class="form-label">Name:</label>
                {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) !!}
                <small id="name_error" class="form-text text-danger"></small>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="form-label">Email:</label>
                {!! Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) !!}
                <small id="name_error" class="form-text text-danger"></small>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="form-label">Password:</label>
                {!! Form::text('password', null, array('placeholder' => 'Password', 'class' => 'form-control')) !!}
                <small id="name_error" class="form-text text-danger"></small>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="form-label">Role:</label>
                {!! Form::select('roles[]', $roles, [], array('class' => 'form-control', 'multiple')) !!}
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Theme Settings -->
    <x-settings></x-settings>

    <!-- Loader -->
    <x-loader></x-loader>

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

      function openModal() {
        save_method = 'add';
        $("#pass_div").show();
        $('#btnSave').text('Save');
        $('#registerForm')[0].reset();
        $('.form-group').find(".has-error").removeClass("has-error");
        $('.help-block').empty();
        $('#modalForm').modal('show');
        $('.modal-title').text('Tambah User');
      }

      function reset() {
        $('#registerForm')[0].reset();
        $('.modal-title').text('Tambah Permissions');
      };

      function edit(id) {
        save_method = 'update';
        $('#registerForm')[0].reset();
        $('.form-group').removeClass('has-error');
        $(".form-group>div").removeClass("has-error");
        $('.help-block').empty();

        $.ajax({
          data: {
            "id": id,
            "_token": "{{ csrf_token() }}"
          },
          url: "{{ route('permissions.edited') }}",
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            $('[name="kode"]').val(data.data.id);
            $('[name="permission"]').val(data.data.name);

            $('#modalForm').modal('show');
            $('.modal-title').text('Edit Permissions');
            $('#btnSave').text('Update');
          },
          error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire(
              'Oops...',
              jqXHR.responseJSON.message,
              textStatus
            );
          }
        });
      }

      function hapus(id) {
        Swal.fire({
          title: "Anda yakin?",
          text: "Data yang dihapus tidak bisa dikembalikan!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, hapus",
          cancelButtonText: "Batal"
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              data: {
                "id": id,
                "_token": "{{ csrf_token() }}"
              },
              url: "{{ route('permissions.deleted') }}",
              type: "POST",
              dataType: "JSON",
              success: function(data) {
                reload_table();
              },
              error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire(
                  'Oops...',
                  jqXHR.responseJSON.message,
                  textStatus
                );
              }
            });
          }
        });
      }

      function show(id, PermissionName) {
        $('#modalShow .modal-title').text(PermissionName);
        $('#modalShow').modal('show');
        $.ajax({
          data: {
            "id": id,
            "_token": "{{ csrf_token() }}"
          },
          url: "{{ route('roles.showed') }}",
          type: "POST",
          dataType: "JSON",
          success: function(data) {
            let permission  = data.permissions;
            let listing     = [];
            Object.keys(permission).forEach(key => {
              listing.push('<li class="list-group-item">' +
                              '<input class="form-check-input me-1" type="checkbox" value="" id="' + key + '" checked disabled>' +
                              '<label class="form-check-label" for="firstCheckbox">' + permission[key].name + '</label>' +
                            '</li>');
            });
            $("#listing").html(listing);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire(
              'Oops...',
              jqXHR.responseJSON.message,
              textStatus
            );
          }
        });
      }

      function reload_table() {
        table.ajax.reload(null,false);
      };

      function save(params) {
        var url;
        if(save_method == 'add') {
          url = "{{ route('users.store') }}";
        } else {
          url = "{{ route('roles.store') }}";
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

      $(document).ready(function () {
        $("#loading").hide();

        table = $('#table-data').DataTable({ 
          pagingType: "full_numbers",
          lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
          ],
          responsive: false,
          processing: true,
          serverSide: true,
          order: [[1, 'desc']], //[2, 'desc']
          ajax: {
            "url": "{{ route('table.user') }}",
            "type": "GET",
          },
          columns: [
            {
              data: 'DT_RowIndex',
              name: 'DT_RowIndex',
              orderable: false, 
              searchable: false,
              className: 'text-end'
            },
            {
              data: 'action',
              name: 'action',
              orderable: false,
              searchable: false,
              className: 'text-center'
            },
            {
              data: 'name',
              name: 'name',
              className: 'text-start'
            },
            {
              data: 'email',
              name: 'email',
              className: 'text-start'
            },
            {
              data: 'roles',
              name: 'roles',
              className: 'text-start'
            }
          ]
        });


        $('[name="name"]').change(function(){
          $(this).parent().removeClass('has-error');
          $(this).next().empty();
        });

        $('[name="email"]').change(function(){
          $(this).parent().removeClass('has-error');
          $(this).next().empty();
        });
      });
    </script>
  </body>
</html>