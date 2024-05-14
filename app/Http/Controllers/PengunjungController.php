<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorModel;
use DataTables;
use Illuminate\Support\Facades\URL;
//use Carbon\Carbon;
use Illuminate\Support\Carbon;

class PengunjungController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $Title    = "Pengunjung";
    $SubTitle = "Daftar Pengunjung";

    return view('visitor.daftar', compact('Title', 'SubTitle'));
  }

  public function dataTable(Request $request)
  {
    $StartDate  = $request->input('start_date');
    $EndDate    = $request->input('end_date');

    $data       = VisitorModel::whereRaw('DATE(CheckinDate) BETWEEN ? AND ?', [$StartDate, $EndDate])->orderBy('CheckinDate', 'DESC');

    return DataTables::eloquent($data)
    ->addIndexColumn()
    ->addColumn('action', function ($data) {
      $Url = URL::to('/')."/visitor/visitor-detail/".base64_encode($data->VisitorEmail)."/".$data->Tickets."/User";
      $actionBtn = '<a class="btn btn-outline-success btn-sm me-1" href="'.$Url.'" target="_blank" title="Lihat lebih lengkap"> 
                      <i class="ri-zoom-in-line"></i>
                    </a>';
      
      return $actionBtn;
    })
    ->rawColumns(['action'])
    ->toJson();
  }
}
