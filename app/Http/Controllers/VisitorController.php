<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TelegramModel;
use App\Models\Form;
use App\Models\Tujuan;
use App\Models\Syaratketentuan;
use App\Models\VisitorModel;
use DB;
use Illuminate\Support\Arr;
use Validator;
use App\Rules\ReCaptcha;
use Illuminate\Support\Str;
use Jenssegers\Agent\Facades\Agent;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

use Telegram\Bot\Laravel\Facades\Telegram;

class VisitorController extends Controller
{

  public function index()
  {
    //$activity = Telegram::getUpdates();
    //dd($activity);

    $Title              = "Visitor";
    $SubTitle           = "Register";
    $DataDiri           = Form::find(1);
    $Tujuan             = Tujuan::find(1);
    $Syaratketentuan    = Syaratketentuan::find(1);
    $Devices            = Agent::platform()."-".Agent::device()."-".Agent::browser()."-".Agent::version(Agent::platform());
    $Tickets            = strtoupper(Str::random(7));
    $CheckoutDateLimit  = Carbon::now()->addHours(5)->format('Y-m-d H:i:s');

    return view('visitor.index', compact('Title', 'SubTitle', 'DataDiri', 'Tujuan', 'Syaratketentuan', 'Devices', 'Tickets', 'CheckoutDateLimit'));
  }

  public function send_data_diri(Request $request) {
    $input_request  = $request->input();
    $validator      = Validator::make($input_request, [
      'g-recaptcha-response' => ['required', new ReCaptcha]
    ]);

    if ($validator->fails()) {
      return response()->json(
        [
          'error_string'  => $validator->errors()->all(),
          'inputerror'    => $validator->errors()->keys(),
          'status_code'   => 422
        ], 422
      );
    }

    $AllRequest = $request->except(['g-recaptcha-response', '_token']);
    $Save       = VisitorModel::create($AllRequest);
    if ($Save) {
      $Email          = VisitorModel::where('VisitorEmail', $request['VisitorEmail'])->orderBy('CheckinDate', 'DESC')->first();
      $VisitorCompany = $Email->VisitorCompany == '' ? '-' : $Email->VisitorCompany;
      $URL            = URL::to('/')."/visitor/visitor-detail/".base64_encode($request['VisitorEmail'])."/".$request['Tickets']."/User";

      $text   = "<b>== INFO PENGUNJUNG BARU ==</b> \n\n";
      $text  .= "Halo team, ada pengunjung baru: \n";
      $text  .= "No. Ticket: <b>".$request['Tickets']."</b>\n";
      $text  .= "Nama: <b>".$request['VisitorName']."</b> \n";
      $text  .= "Perusahaan: <b>".$VisitorCompany."</b> \n";
      $text  .= "Keperluan: <b>".$request['ArrivalDestination']."</b>\n\n";
      $text  .= "Berkunjung untuk bertemu: \n";
      $text  .= "Nama tujuan: <b>".$request['AddresseesName']."</b>\n";
      $text  .= "Dept. tujuan: <b>".$request['DepartmentDestination']."</b>\n";
      $text  .= "Selengkapnya: <a href='".$URL."'>Klik disini</a> \n\n";
      $text  .= "Sekian dan terima kasih.\n";
      $text  .= "<i>Dikirim dari system <a href='".URL::to('/')."'>e-Receptionist</a>.</i>";

      Telegram::sendMessage([
        'chat_id'       => env('TELEGRAM_CHANNEL_ID', ''),
        'parse_mode'    => 'HTML',
        'text'          => $text
      ]);

      return response()->json([
        'status_code' => 200,
        'status'      => "success",
        'message'     => "Data sukses disimpan",
        'data'        => $Save,
        'url'         => URL::to('/')."/visitor/sukses-daftar/".base64_encode($request['VisitorEmail'])."/".$request['Tickets']."/Visitor"
      ], 200);
    } else {
      return response()->json([
        'status_code' => 500,
        'status'      => "success",
        'message'     => "Data gagal disimpan",
        'data'        => array()
      ], 500);
    }
  }

  public function visitor_detail($Emails, $Tickets, $Channels) {
    $Title    = "Visitor";
    $SubTitle = "Info Pengunjung";
    $Ticket   = $Tickets;
    $Email    = base64_decode($Emails);
    $Channel  = $Channels;
    $Visitor  = VisitorModel::where('VisitorEmail', $Email)->where('Tickets', $Tickets)->orderBy('CheckinDate', 'DESC')->first();
    
    return view('visitor.detail', compact('Title', 'SubTitle', 'Email', 'Ticket', 'Visitor', 'Channel'));
  }

  public function sukses_daftar($Emails, $Tickets, $Channels) {
    $Title    = "Visitor";
    $SubTitle = "Sukses";
    $Ticket   = $Tickets;
    $Email    = base64_decode($Emails);
    $Channel  = $Channels;
    $LinkUrl  = URL::to('/')."/visitor/visitor-detail/".base64_encode($Email)."/".$Ticket."/User";
    $Visitor  = VisitorModel::where('VisitorEmail', $Email)->where('Tickets', $Tickets)->orderBy('CheckinDate', 'DESC')->first();
    
    return view('visitor.sukses', compact('Title', 'SubTitle', 'Email', 'Ticket', 'Visitor', 'Channel', 'LinkUrl'));
  }

  public function checkout_manual(Request $request) {
    $input_request  = $request->input();
    $validator      = Validator::make($input_request, [
      'Emails'      => 'required|min:5|email',
      'Tickets'     => 'required|min:7',
      'Channels'    => 'required|min:3',
      'Date'        => 'required'
    ]);

    if ($validator->fails()) {
      return response()->json(
        [
          'error_string'  => $validator->errors()->all(),
          'inputerror'    => $validator->errors()->keys(),
          'status_code'   => 422
        ], 422
      );
    }

    $Update  = VisitorModel::where('VisitorEmail', $request['Emails'])
              ->where('Tickets', $request['Tickets'])
              ->update([
                'Status'        => "Out",
                'CheckoutDate'  => $request['Date'],
                'CheckoutBy'    => $request['Channels']
              ]);
    if ($Update) {
      return response()->json([
        'status_code' => 200,
        'status'      => "success",
        'message'     => "Anda sukses checkout"
      ], 200);
    } else {
      return response()->json([
        'status_code' => 500,
        'status'      => "success",
        'message'     => "Anda gagal checkout"
      ], 500);
    }
  }

  public function list_data_diri() {
    $DataDiri = Form::find(1);

    $Form     = "";
    if ($DataDiri) {
      return response()->json([
        'status_code' => 200,
        'status'      => "success",
        'message'     => "Data sukses ditampilkan",
        'tujuan'      => $DataDiri,
        'html'        => $Form
      ], 200);
    } else {
      return response()->json([
        'status_code' => 200,
        'status'      => "success",
        'message'     => "Data gagal ditampilkan",
        'tujuan'      => array()
      ], 200);
    }
  }

  public function jadwal() {
    $StartDate  = Carbon::now()->startOfMonth()->format('Y-m-d');
    $EndDate    = Carbon::now()->endOfMonth()->format('Y-m-d');
    $Title      = "Visitor";
    $SubTitle   = "Jadwal";

    return view('visitor.jadwal', compact('Title', 'SubTitle', 'StartDate', 'EndDate'));
  }

  public function jadwal_list(Request $request) {
    $StartDate  = $request->input('StartDate');
    $EndDate    = $request->input('EndDate');

    $Data       = VisitorModel::select(DB::raw('Tickets, VisitorName, TO_BASE64(VisitorEmail) AS VisitorEmail, ArrivalDestination, Status, CheckinDate, CheckoutDate'))
                  ->whereRaw('DATE(CheckinDate) BETWEEN ? AND ?', [$StartDate, $EndDate])
                  ->orderBy('CheckinDate', 'DESC')
                  ->get();
    if ($Data) {
      return response()->json([
        'status_code' => 200,
        'status'      => "success",
        'message'     => "Data sukses ditampilkan",
        'data'        => $Data
      ], 200);
    } else {
      return response()->json([
        'status_code' => 500,
        'status'      => "success",
        'message'     => "Data gagal ditampilkan",
        'tujuan'      => array()
      ], 500);
    }
  }

}
