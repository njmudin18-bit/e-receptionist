<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qr;
use App\Models\Syaratketentuan;
use DB;
use Auth;
use DataTables;
use Validator;

class QrController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $Title    = "QR";
    $SubTitle = "Buat QR";

    return view('qr.index', compact('Title', 'SubTitle'));
  }

  public function qr_preview() {
    $Title            = "QR";
    $SubTitle         = "Cetak QR";
    $SyaratKetentuan  = SyaratKetentuan::first();
    $QR               = Qr::first();
    $LinkUrl          = $QR->LinkUrl;

    return view('qr.cetak', compact('Title', 'SubTitle', 'LinkUrl', 'SyaratKetentuan'));
  }

  public function store(Request $request)
  {
    $input_request = $request->input();
    $validator = Validator::make($input_request, [
      'Name'      => 'required|min:2',
      'LinkUrl'   => 'required|min:2'
    ]);

    if ($validator->fails()) {
      return response()->json(
        [
          'error_string'  => $validator->errors()->all(),
          'inputerror'    => $validator->errors()->keys(),
          'status_code'   => 500
        ], 500
      );
    }

    $save = Qr::create([
      'Name'        => $request->input('Name'), 
      'LinkUrl'     => $request->input('LinkUrl'),
      'CreatedDate' => date('Y-m-d H:i:s'),
      'CreatedBy'   => Auth::user()->id,
    ]);
    if ($save) {
      return response()->json([
        'status_code' => 200,
        'status'      => "success",
        'message'     => "Data berhasil disimpan"
      ], 200);
    } else {
      return response()->json([
        'status_code' => 500,
        'status'      => "error",
        'message'     => "Data gagal disimpan"
      ], 500);
    }
  }

  public function edited(Request $request)
  {
    $id   = $request->input('id');
    $data = Qr::findOrFail($id);

    return response()->json([
      'status_code' => 200,
      'status'      => "success",
      'message'     => "Data berhasil ditampilkan",
      'data'        => $data
    ], 200);
  }

  public function updated(Request $request)
  {
    $input_request = $request->input();
    $validator = Validator::make($input_request, [
      'Name'      => 'required|min:2',
      'LinkUrl'   => 'required|min:2'
    ]);

    if ($validator->fails()) {
      return response()->json(
        [
          'error_string'  => $validator->errors()->all(),
          'inputerror'    => $validator->errors()->keys(),
          'status_code'   => 500
        ], 500
      );
    }

    $update = Qr::where('Id', $request->input('kode'))
    ->update([
      'Name'        => $request->input('Name'), 
      'LinkUrl'     => $request->input('LinkUrl'),
      'UpdatedDate' => date('Y-m-d H:i:s'),
      'UpdatedBy'   => Auth::user()->id
    ]);
    if ($update) {
      return response()->json([
        'status_code' => 200,
        'status'      => "success",
        'message'     => "Data berhasil disimpan"
      ], 200);
    } else {
      return response()->json([
        'status_code' => 500,
        'status'      => "error",
        'message'     => "Data gagal disimpan"
      ], 500);
    }
  }

  public function deleted(Request $request) {
    $deleted = Qr::where('Id', $request->input('id'))->delete();
    if ($deleted) {
      return response()->json([
        'status_code' => 200,
        'status'      => "success",
        'message'     => "Data berhasil dihapus"
      ], 200);
    } else {
      return response()->json([
        'status_code' => 500,
        'status'      => "error",
        'message'     => "Data gagal dihapus"
      ], 500);
    }
  }

  public function dataTable()
  {
    //$qr = Qr::query();
    $qr = Qr::orderBy('CreatedDate', 'DESC');

    return DataTables::eloquent($qr)
    ->addIndexColumn()
    ->addColumn('action', function ($qr) {
      $actionBtn = '<button class="btn btn-outline-success btn-sm me-1" onclick="edit('.$qr->Id.')" title="Edit"> 
                      <i class="ri-edit-2-fill"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm" onclick="hapus('.$qr->Id.')" title="Edit"> 
                      <i class="ri-delete-bin-2-line"></i>
                    </button>';
      
      return $actionBtn;
    })
    ->rawColumns(['action'])
    ->toJson();
  }
}
