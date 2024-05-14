<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorModel;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
      // $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $Title                = "Dashboard";
      $SubTitle             = "Dashboard";
      $CurrentWeek          = Carbon::now()->startOfWeek()->format('d M Y') . ' - ' . Carbon::now()->endOfWeek()->format('d M Y');
      $CurrentMonth         = Carbon::now()->format('F Y');
      $TotalPengunjung      = VisitorModel::count();
      $PengunjungHariIni    = VisitorModel::whereDate('CheckinDate', Carbon::today())->count();;
      $PengunjungMingguIni  = VisitorModel::whereBetween('CheckinDate', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                              ->whereRaw('DAYNAME(CheckinDate) != ?', ['SUNDAY'])
                              ->count();
      $PengunjungBulanIni   = VisitorModel::whereMonth('CheckinDate', Carbon::now()->month)->count();
      $DataPengunjung       = VisitorModel::orderBy('CheckinDate', 'desc')->limit(10)->get();

      return view('home', compact('Title', 'SubTitle', 'CurrentWeek', 
                                  'CurrentMonth', 'TotalPengunjung', 'PengunjungHariIni',
                                  'PengunjungMingguIni', 'PengunjungBulanIni',
                                  'DataPengunjung'
                                ));
    }

    public function data_grafik() {
      $DataBulanan = DB::table('trans_visitor')
      ->select(
        DB::raw("SUM(CASE MONTH(CheckinDate) WHEN 1 THEN 1 ELSE 0 END) AS 'Jan'"),
        DB::raw("SUM(CASE MONTH(CheckinDate) WHEN 2 THEN 1 ELSE 0 END) AS 'Feb'"),
        DB::raw("SUM(CASE MONTH(CheckinDate) WHEN 3 THEN 1 ELSE 0 END) AS 'Mar'"),
        DB::raw("SUM(CASE MONTH(CheckinDate) WHEN 4 THEN 1 ELSE 0 END) AS 'Apr'"),
        DB::raw("SUM(CASE MONTH(CheckinDate) WHEN 5 THEN 1 ELSE 0 END) AS 'May'"),
        DB::raw("SUM(CASE MONTH(CheckinDate) WHEN 6 THEN 1 ELSE 0 END) AS 'Jun'"),
        DB::raw("SUM(CASE MONTH(CheckinDate) WHEN 7 THEN 1 ELSE 0 END) AS 'Jul'"),
        DB::raw("SUM(CASE MONTH(CheckinDate) WHEN 8 THEN 1 ELSE 0 END) AS 'Aug'"),
        DB::raw("SUM(CASE MONTH(CheckinDate) WHEN 9 THEN 1 ELSE 0 END) AS 'Sep'"),
        DB::raw("SUM(CASE MONTH(CheckinDate) WHEN 10 THEN 1 ELSE 0 END) AS 'Oct'"),
        DB::raw("SUM(CASE MONTH(CheckinDate) WHEN 11 THEN 1 ELSE 0 END) AS 'Nov'"),
        DB::raw("SUM(CASE MONTH(CheckinDate) WHEN 12 THEN 1 ELSE 0 END) AS 'Dec'"),
      )
      ->whereRaw('YEAR(CheckinDate) = ?', [Carbon::now()->year])
      ->get();

      return response()->json([
        'status_code'   => 200,
        'status'        => "success",
        'message'       => "Data sukses ditampilkan",
        'data_bulanan'  => $DataBulanan
      ], 200);
    }
}
