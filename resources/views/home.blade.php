<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>{{ $Title }} | {{ config('appsproperties.APPS_NAME') }}</title>
    <!-- Meta Name -->
    <x-metas :subtitle="$SubTitle"></x-metas>
    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}">
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
              <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-pink">
                  <div class="card-body">
                    <div class="float-end">
                      <i class="ri-eye-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Pengunjung hari ini</h6>
                    <h2 class="my-2">{{ $PengunjungHariIni }}</h2>
                    <p class="mb-0">
                      <!-- <span class="badge bg-white bg-opacity-10 me-1">2.97%</span> -->
                      <span class="text-nowrap">{{ date('d M Y') }}</span>
                    </p>
                  </div>
                </div>
              </div> <!-- end col-->

              <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-purple">
                  <div class="card-body">
                    <div class="float-end">
                      <i class="ri-wallet-2-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Pengunjung minggu ini</h6>
                    <h2 class="my-2">{{ $PengunjungMingguIni }}</h2>
                    <p class="mb-0">
                      <!-- <span class="badge bg-white bg-opacity-10 me-1">18.25%</span> -->
                      <span class="text-nowrap">{{ $CurrentWeek }}</span>
                    </p>
                  </div>
                </div>
              </div> <!-- end col-->

              <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-info">
                  <div class="card-body">
                    <div class="float-end">
                      <i class="ri-shopping-basket-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Pengunjung bulan ini</h6>
                    <h2 class="my-2">{{ $PengunjungBulanIni }}</h2>
                    <p class="mb-0">
                      <!-- <span class="badge bg-white bg-opacity-25 me-1">-5.75%</span> -->
                      <span class="text-nowrap">{{ $CurrentMonth }}</span>
                    </p>
                  </div>
                </div>
              </div> <!-- end col-->

              <div class="col-xxl-3 col-sm-6">
                <div class="card widget-flat text-bg-primary">
                  <div class="card-body">
                    <div class="float-end">
                      <i class="ri-group-2-line widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Total Pengunjung</h6>
                    <h2 class="my-2">{{ $TotalPengunjung }}</h2>
                    <p class="mb-0">
                      <span class="text-nowrap">Sejak 01 Mei 2024</span>
                    </p>
                  </div>
                </div>
              </div> <!-- end col-->
            </div>

            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="card-widgets">
                      <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                      <a data-bs-toggle="collapse" href="#weeklysales-collapse" role="button" aria-expanded="false" aria-controls="weeklysales-collapse"><i class="ri-subtract-line"></i></a>
                      <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                    </div>
                    <h5 class="header-title mb-0">Total pengunjung bulanan tahun {{ date('Y') }}</h5>
                    <div id="weeklysales-collapse" class="collapse pt-3 show">
                      <div dir="ltr">
                        <div id="monthly-chart" class="apex-charts" data-colors="#3bc0c3,#1a2942,#d1d7d973"></div>
                      </div>
                    </div>
                  </div> <!-- end card-body-->
                </div> <!-- end card-->
              </div> <!-- end col-->
            </div>
            <!-- end row -->

            <div class="row">
              <div class="col-xl-12">
                <!-- Todo-->
                <div class="card">
                  <div class="card-body p-0">
                    <div class="p-3">
                      <div class="card-widgets">
                        <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                        <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                        <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                      </div>
                      <h5 class="header-title mb-0">Pengunjung terbaru</h5>
                    </div>

                    <div id="yearly-sales-collapse" class="collapse show">
                      <div class="table-responsive">
                        <!-- <table class="table table-nowrap table-striped table-hover mb-0"> -->
                        <table class="table table-striped table-hover mb-0">
                          <thead>
                            <tr class="bg-primary">
                              <th class="text-center text-white">No</th>
                              <th class="text-center text-white">Status</th>
                              <th class="text-center text-white">Nama Pengunjung</th>
                              <th class="text-center text-white">Checkin Date</th>
                              <th class="text-center text-white">Checkout Date</th>
                              <th class="text-center text-white">Tujuan</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if (count($DataPengunjung))
                              @foreach ($DataPengunjung as $item)
                              <tr>
                                  <td class="text-end">{{ $loop->index + 1 }}</td>
                                  @if ($item->Status == 'In')
                                  <td class="text-center"><span class="badge bg-info-subtle text-info">{{ strtoupper($item->Status) }}</span></td>
                                  @else
                                  <td class="text-center"><span class="badge bg-danger-subtle text-info">{{ strtoupper($item->Status) }}</span></td>
                                  @endif
                                  <td class="text-start">
                                      <a href="{{ URL::to('/') }}/visitor/visitor-detail/{{ base64_encode($item->VisitorEmail) }}/{{ $item->Tickets }}/User" target="_blank" title="Klik detail {{ $item->VisitorName }}">
                                          {{ $item->VisitorName }}
                                      </a>
                                  </td>
                                  <td class="text-center">{{ $item->CheckinDate }}</td>
                                  <td class="text-center">{{ $item->CheckoutDate }}</td>
                                  <td class="text-start">{{ $item->ArrivalDestination }}</td>
                              </tr>
                              @endforeach
                            @else
                            <tr>
                                <td class="text-center" colspan="6">Data tidak ditemukan</td>
                            </tr>
                            @endif
                          </tbody>
                        </table>
                      </div>        
                    </div>
                  </div>                           
                </div> <!-- end card-->
              </div> <!-- end col-->
            </div>
            <!-- end row -->
          </div>
          <!-- container -->
        </div>
        <!-- content -->

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
    <!-- Daterangepicker js -->
    <script src="{{ asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Apex Charts js -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Vector Map js -->
    <script src="{{ asset('assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- Dashboard App js -->
    <!-- <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script> -->
    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
    <script>
      function load_data() {
        $.ajax({
          data: {
            "_token": "{{ csrf_token() }}"
          },
          url: "{{ route('home.data-grafik') }}",
          type: "POST",
          dataType: "JSON",
          beforeSend: function(data) {
            $("#loading").show();
          },
          success: function(data) {
            let ResultBulan = data.data_bulanan[0];
            
            let QtyBulanan    = [];
            let LabelBulanan  = [];

            Object.entries(ResultBulan).forEach(entry => {
              const [key, value] = entry;
              LabelBulanan.push(key);
              QtyBulanan.push(value);
            });

            var MonthlyOptions = {
              series: [
                {
                  name: "Total pengunjung",
                  data: QtyBulanan
                }
              ],
              chart: {
                height: 350,
                type: 'line',
                dropShadow: {
                  enabled: true,
                  color: '#000',
                  top: 18,
                  left: 7,
                  blur: 10,
                  opacity: 0.2
                },
                zoom: {
                  enabled: false
                },
                toolbar: {
                  show: false
                }
              },
              colors: ['#77B6EA', '#545454'],
              dataLabels: {
                enabled: true,
              },
              stroke: {
                curve: 'smooth'
              },
              title: {
                text: '',
                align: 'left'
              },
              grid: {
                borderColor: '#e7e7e7',
                row: {
                  colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                  opacity: 0.5
                },
              },
              markers: {
                size: 1
              },
              xaxis: {
                categories: LabelBulanan,
                title: {
                  text: "Tahun {{ date('Y') }}"
                }
              },
              yaxis: {
                title: {
                  text: 'Total'
                },
                min: 5,
                max: 40
              },
              legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
              }
            };

            var MonthlyChart = new ApexCharts(document.querySelector("#monthly-chart"), MonthlyOptions);
            MonthlyChart.render();

            $("#loading").hide();
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

      $(document).ready(function () {
        load_data();
      });
    </script>
  </body>
</html> 