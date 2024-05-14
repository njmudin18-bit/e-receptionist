<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TelegramModel;
use DB;
use Auth;
use DataTables;
use Validator;

class TelegramController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $Title    = "Telegram";
    $SubTitle = "Register Tokens";

    return view('telegram.index', compact('Title', 'SubTitle'));
  }

  public function store(Request $request)
  {
    $input_request = $request->input();
    $validator = Validator::make($input_request, [
      'Departments' => 'required|min:2',
      'Tokens'      => 'required|min:2',
      'RequestUrls' => 'required|min:2'
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

    $save = TelegramModel::create([
      'Departments'   => $request->input('Departments'), 
      'Tokens'        => $request->input('Tokens'),
      'RequestUrls'   => $request->input('RequestUrls'),
      'CreatedDate'   => date('Y-m-d H:i:s'),
      'CreatedBy'     => Auth::user()->id,
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
    $data = TelegramModel::findOrFail($id);

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
      'Departments' => 'required|min:2',
      'Tokens'      => 'required|min:2',
      'RequestUrls' => 'required|min:2'
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

    $update = TelegramModel::where('Id', $request->input('kode'))
    ->update([
      'Departments'   => $request->input('Departments'), 
      'Tokens'        => $request->input('Tokens'),
      'RequestUrls'   => $request->input('RequestUrls'),
      'UpdatedDate'   => date('Y-m-d H:i:s'),
      'UpdatedBy'     => Auth::user()->id
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
    $deleted = TelegramModel::where('Id', $request->input('id'))->delete();
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
    //$Telegram = TelegramModel::query();
    $Telegram = TelegramModel::orderBy('CreatedDate', 'DESC');

    return DataTables::eloquent($Telegram)
    ->addIndexColumn()
    ->addColumn('action', function ($Telegram) {
      $actionBtn = '<button class="btn btn-outline-success btn-sm me-1" onclick="edit('.$Telegram->Id.')" title="Edit"> 
                      <i class="ri-edit-2-fill"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm" onclick="hapus('.$Telegram->Id.')" title="Edit"> 
                      <i class="ri-delete-bin-2-line"></i>
                    </button>';
      
      return $actionBtn;
    })
    ->rawColumns(['action'])
    ->toJson();
  }
}
