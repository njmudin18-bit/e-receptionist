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
    <!-- Daterangepicker css -->
    <x-daterangepickercss></x-daterangepickercss>
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
                    <div class="table-responsive">
                      <div class="row g-3 mb-0 align-items-center">
                        <div class="col-sm-3">
                          <label class="col-form-label">Filter By Date</label>
                        </div>
                        <div class="col-sm-4">
                          <div class="input-group">
                            <input type="text" class="form-control" name="tanggal" id="tanggal">
                            <div class="input-group-text bg-primary border-primary text-white">
                              <i class="ri-calendar-2-line"></i>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-2 d-grid gap-2">
                          <input type="hidden" name="start_date" id="start_date">
                          <input type="hidden" name="end_date" id="end_date">
                          <button id="btnCari" onclick="cari();" type="button" class="btn btn-info btn-full-mobile">Tampilkan</button>
                        </div>
                      </div>
                      <hr>
                      <table id="table-data" class="table table-striped table-bordered dt-responsive nowrap w-100" width="220%">
                        <thead>
                          <tr class="bg-primary">
                            <th class="text-white text-center" width="5%">No</th>
                            <th class="text-white text-center" width="10%">
                              <i class="ri-settings-3-line"></i>
                            </th>
                            <th class="text-white text-center" width="5%">Ticket</th>
                            <th class="text-white text-center" width="5%">Status</th>
                            <th class="text-white text-center" width="15%">Pengunjung</th>
                            <th class="text-white text-center" width="10%">Email</th>
                            <th class="text-white text-center" width="10%">Phone</th>
                            <th class="text-white text-center">Dept. Tujuan</th>
                            <th class="text-white text-center">Nama Tujuan</th>
                            <th class="text-white text-center">Tujuan Kedatangan</th>
                            <th class="text-white text-center">Checkin</th>
                            <th class="text-white text-center">Checkout</th>
                            <th class="text-white text-center">Checkout By</th>
                            <th class="text-white text-center">Devices</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
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

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- Datatables js -->
    <x-datatablejs></x-datatablejs>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/customs.js') }}"></script>
    <!-- Daterangepicker js -->
    <x-daterangepickerjs></x-daterangepickerjs>
    <script type="text/javascript">
      $(function() {
        //var start = moment().subtract(30, 'days');
        var start = moment().startOf('month');
        var end   = moment();
        function cb(start, end) {
          var sd = start.format('YYYY-MM-DD');
          var ed = end.format('YYYY-MM-DD');
          
          $('#tanggal').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
          $('#start_date').val(start.format('YYYY-MM-DD'));
          $('#end_date').val(end.format('YYYY-MM-DD'));
        }
          
        $('#tanggal').daterangepicker({
          startDate: start,
          endDate: end,
          maxDate: new Date(),
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          locale: {
            format: 'YYYY-MM-DD'
          },
          function(start, end, label) {
            startDate = start;
            endDate = end;
          }
        }, cb);

        cb(start, end);
      });
    </script>
    <script>
      //FUNCTION CARI
      function cari() {
        reload_table();
      }

      //FUNCTION RELOAD TABLE
      function reload_table(){
        table.ajax.reload(null, false);
      };

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
            "url": "{{ route('pengunjung.list') }}",
            "type": "GET",
            "data": function(data) {
              data.start_date   = $('#start_date').val(); 
              data.end_date     = $('#end_date').val(); 
            }
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
              data: 'Tickets',
              name: 'Tickets',
              className: 'text-center'
            },
            {
              data: 'Status',
              name: 'Status',
              className: 'text-center text-capitalize'
            },
            {
              data: 'VisitorName',
              name: 'VisitorName',
              className: 'text-start'
            },
            {
              data: 'VisitorEmail',
              name: 'VisitorEmail',
              className: 'text-start'
            },
            {
              data: 'VisitorPhone',
              name: 'VisitorPhone',
              className: 'text-start'
            },
            {
              data: 'DepartmentDestination',
              name: 'DepartmentDestination',
              className: 'text-start'
            },
            {
              data: 'AddresseesName',
              name: 'AddresseesName',
              className: 'text-start'
            },
            {
              data: 'ArrivalDestination',
              name: 'ArrivalDestination',
              className: 'text-start'
            },
            {
              data: 'CheckinDate',
              name: 'CheckinDate',
              className: 'text-start'
            },
            {
              data: 'CheckoutDate',
              name: 'CheckoutDate',
              className: 'text-start'
            },
            {
              data: 'CheckoutBy',
              name: 'CheckoutBy',
              className: 'text-start'
            },
            {
              data: 'Devices',
              name: 'Devices',
              className: 'text-start'
            }
          ]
        });
      });
    </script>
  </body>
</html>