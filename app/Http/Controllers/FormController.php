<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Tujuan;
use App\Models\QR;
use App\Models\Syaratketentuan;
use DB;
use Auth;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Title    = "Formulir";
      $SubTitle = "Setting Formulir";
      $QR       = Qr::first();
      $LinkUrl  = $QR->LinkUrl;

      return view('forms.index', compact('Title', 'SubTitle', 'LinkUrl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activated_form_syarat_dan_ketentuan(Request $request)
    {
      $Activated  = $request->input('activated');
      if ($Activated == "Yes") {
        $affected = DB::table('ms_formsyaratdanketentuan')
        ->where('id', 1)
        ->update(
          [
            'Activated'           => $Activated,
            'UpdatedDate'         => date('Y-m-d H:i:s'),
            'UpdatedBy'           => Auth::user()->id
          ]
        );
      } else {
        $affected = DB::table('ms_formsyaratdanketentuan')
        ->where('id', 1)
        ->update(
          [
            'Activated'           => $Activated,
            'UpdatedDate'         => date('Y-m-d H:i:s'),
            'UpdatedBy'           => Auth::user()->id
          ]
        );
      }

      $SyaratKetentuan = Syaratketentuan::find(1);
      if ($affected) {
        return response()->json([
          'status_code'       => 200,
          'status'            => "success",
          'message'           => "Data berhasil disimpan",
          'syarat_ketentuan'  => $SyaratKetentuan
        ], 200);
      } else {
        return response()->json([
          'status_code'       => 200,
          'status'            => "sucess",
          'message'           => "Data sukses disimpan",
          'syarat_ketentuan'  => $SyaratKetentuan
        ], 500);
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updated_form_data_diri(Request $request)
    {
      $Names      = $request->input('Names');
      $Emails     = $request->input('Emails');
      $Phones     = $request->input('Phones');
      $Genders    = $request->input('Genders');
      $Addresss   = $request->input('Addresss');
      $Companys   = $request->input('Companys');

      $affected   = DB::table('ms_formdatadiri')
      ->where('id', 1)
      ->update(
        [
          'VisitorName' => "Yes",
          'Email'       => $Emails,
          'Phone'       => $Phones,
          'Gender'      => $Genders,
          'Address'     => $Addresss,
          'Company'     => $Companys,
          'UpdatedDate' => date('Y-m-d H:i:s'),
          'UpdatedBy'   => Auth::user()->id,
        ]
      );

      $DataDiri          = Form::find(1);
      $CheckedDDName     = $DataDiri->VisitorName == 'Yes' ? 'Checked' : '';
      $CheckedDDEmail    = $DataDiri->Email == 'Yes' ? 'Checked' : '';
      $CheckedDDPhone    = $DataDiri->Phone == 'Yes' ? 'Checked' : '';
      $CheckedDDGender   = $DataDiri->Gender == 'Yes' ? 'Checked' : '';
      $CheckedDDAddreess = $DataDiri->Address == 'Yes' ? 'Checked' : '';
      $CheckedDDCompany  = $DataDiri->Company == 'Yes' ? 'Checked' : '';

      $ClassDDName       = $DataDiri->VisitorName == 'Yes' ? 'border-bold' : '';
      $ClassDDEmail      = $DataDiri->Email == 'Yes' ? 'border-bold' : '';
      $ClassDDPhone      = $DataDiri->Phone == 'Yes' ? 'border-bold' : '';
      $ClassDDGender     = $DataDiri->Gender == 'Yes' ? 'border-bold' : '';
      $ClassDDAddress    = $DataDiri->Address == 'Yes' ? 'border-bold' : '';
      $ClassDDCompany    = $DataDiri->Company == 'Yes' ? 'border-bold' : '';

      $FormDataDiri = 
      '<div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="NameCheckbox" name="NameCheckbox" '.$CheckedDDName.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="Name" name="Name" class="form-control '.$ClassDDName.'" placeholder="Nama *" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="EmailCheckbox" name="EmailCheckbox" '.$CheckedDDEmail.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="email" id="Email" name="Email" class="form-control '.$ClassDDEmail.'" placeholder="Email *" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="PhoneCheckbox" name="PhoneCheckbox" '.$CheckedDDPhone.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="Phone" name="Phone" class="form-control '.$ClassDDPhone.'" placeholder="Nomor Telepon" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="GenderCheckbox" name="GenderCheckbox" '.$CheckedDDGender.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <h6 class="fs-15">Jenis Kelamin</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Gender1" id="Gender1" value="option1" disabled>
            <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Gender2" id="Gender2" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="AddressCheckbox" name="AddressCheckbox" '.$CheckedDDAddreess.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="Address" name="Address" class="form-control" placeholder="Alamat" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="CompanyCheckbox" name="CompanyCheckbox" '.$CheckedDDCompany.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="Company" name="Company" class="form-control" placeholder="Perusahaan" readonly>
        </div>
      </div>
      <div class="row mb-3 float-end">
        <label for="inputEmail3" class="col-12 col-form-label">
          <button type="button" class="btn btn-primary" onclick="UpdateFormDataDiri()">Simpan Formulir Data Diri</button>
        </label>
      </div>';

      if ($affected) {
        return response()->json([
          'status_code' => 200,
          'status'      => "success",
          'message'     => "Data berhasil disimpan",
          'data_diri'       => $DataDiri,
          'form_data_diri'  => $FormDataDiri
        ], 200);
      } else {
        return response()->json([
          'status_code' => 200,
          'status'      => "sucess",
          'message'     => "Data sukses disimpan",
          'data_diri'       => $DataDiri,
          'form_data_diri'  => $FormDataDiri
        ], 500);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_all_form()
    {
      $DataDiri          = Form::find(1);
      $CheckedDDName     = $DataDiri->VisitorName == 'Yes' ? 'Checked' : '';
      $CheckedDDEmail    = $DataDiri->Email == 'Yes' ? 'Checked' : '';
      $CheckedDDPhone    = $DataDiri->Phone == 'Yes' ? 'Checked' : '';
      $CheckedDDGender   = $DataDiri->Gender == 'Yes' ? 'Checked' : '';
      $CheckedDDAddreess = $DataDiri->Address == 'Yes' ? 'Checked' : '';
      $CheckedDDCompany  = $DataDiri->Company == 'Yes' ? 'Checked' : '';

      $ClassDDName       = $DataDiri->VisitorName == 'Yes' ? 'border-bold' : '';
      $ClassDDEmail      = $DataDiri->Email == 'Yes' ? 'border-bold' : '';
      $ClassDDPhone      = $DataDiri->Phone == 'Yes' ? 'border-bold' : '';
      $ClassDDGender     = $DataDiri->Gender == 'Yes' ? 'border-bold' : '';
      $ClassDDAddress    = $DataDiri->Address == 'Yes' ? 'border-bold' : '';
      $ClassDDCompany    = $DataDiri->Company == 'Yes' ? 'border-bold' : '';

      $FormDataDiri = 
      '<div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="NameCheckbox" name="NameCheckbox" '.$CheckedDDName.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="Name" name="Name" class="form-control '.$ClassDDName.'" placeholder="Nama *" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="EmailCheckbox" name="EmailCheckbox" '.$CheckedDDEmail.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="email" id="Email" name="Email" class="form-control '.$ClassDDEmail.'" placeholder="Email *" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="PhoneCheckbox" name="PhoneCheckbox" '.$CheckedDDPhone.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="Phone" name="Phone" class="form-control '.$ClassDDPhone.'" placeholder="Nomor Telepon" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="GenderCheckbox" name="GenderCheckbox" '.$CheckedDDGender.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <h6 class="fs-15">Jenis Kelamin</h6>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Gender1" id="Gender1" value="option1" disabled>
            <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Gender2" id="Gender2" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="AddressCheckbox" name="AddressCheckbox" '.$CheckedDDAddreess.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="Address" name="Address" class="form-control" placeholder="Alamat" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="CompanyCheckbox" name="CompanyCheckbox" '.$CheckedDDCompany.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="Company" name="Company" class="form-control" placeholder="Perusahaan" readonly>
        </div>
      </div>
      <div class="row mb-3 float-end">
        <label for="inputEmail3" class="col-12 col-form-label">
          <button type="button" class="btn btn-primary" onclick="UpdateFormDataDiri()">Simpan Formulir Data Diri</button>
        </label>
      </div>';

      $Tujuan            = Tujuan::find(1);
      $CheckedTJAll      = $Tujuan->All == 'Yes' ? 'Checked' : '';
      $CheckedTJName     = $Tujuan->AddresseesName == 'Yes' ? 'Checked' : '';
      $CheckedTJPhone    = $Tujuan->AddresseesPhone == 'Yes' ? 'Checked' : '';
      $CheckedTJArrival  = $Tujuan->ArrivalDestination == 'Yes' ? 'Checked' : '';
      $CheckedTJDept     = $Tujuan->DepartmentDestination == 'Yes' ? 'Checked' : '';
      $CheckedTJNumbers  = $Tujuan->NumberOfPersons == 'Yes' ? 'Checked' : '';

      $ClassTJName       = $Tujuan->AddresseesName == 'Yes' ? 'border-bold' : '';
      $ClassTJPhone      = $Tujuan->AddresseesPhone == 'Yes' ? 'border-bold' : '';
      $ClassTJArrival    = $Tujuan->ArrivalDestination == 'Yes' ? 'border-bold' : '';
      $ClassTJDept       = $Tujuan->DepartmentDestination == 'Yes' ? 'border-bold' : '';
      $ClassTJNumbers    = $Tujuan->NumberOfPersons == 'Yes' ? 'border-bold' : '';

      $FormTujuan = 
      '<div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="AddresseesNameCheckbox" name="AddresseesNameCheckbox" '.$CheckedTJName.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="AddresseesName" name="AddresseesName" class="form-control '.$ClassTJName.'" placeholder="Nama orang yang dituju" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="AddresseesPhoneCheckbox" name="AddresseesPhoneCheckbox" '.$CheckedTJPhone.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="email" id="AddresseesPhone" name="AddresseesPhone" class="form-control '.$ClassTJPhone.'" placeholder="Nomor telepon orang yang dituju" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="DepartmentDestinationCheckbox" name="DepartmentDestinationCheckbox" '.$CheckedTJDept.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="DepartmentDestination" name="DepartmentDestination" class="form-control '.$ClassTJDept.'" placeholder="Department yang dituju" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="ArrivalDestinationCheckbox" name="ArrivalDestinationCheckbox" '.$CheckedTJArrival.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <h6 class="fs-15">Tujuan</h6>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan1" id="Tujuan1" value="option1" disabled>
            <label class="form-check-label" for="inlineRadio1">Pertemuan</label>
          </div>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan2" id="Tujuan2" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Wawancara & Psikotest</label>
          </div>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan3" id="Tujuan3" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Mengirim Paket</label>
          </div>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan4" id="Tujuan4" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Hari Pertama Bekerja</label>
          </div>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan5" id="Tujuan5" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Lainnya</label>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="NumberOfPersonsCheckbox" name="NumberOfPersonsCheckbox" '.$CheckedTJNumbers.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="NumberOfPersons" name="NumberOfPersons" class="form-control '.$ClassTJNumbers.'" placeholder="Berapa banyak orang yang bersama anda" readonly>
        </div>
      </div>
      <div class="row mb-3 float-end">
        <label for="inputEmail3" class="col-12 col-form-label">
          <button type="button" class="btn btn-primary" onclick="UpdateFormTujuan()">Simpan Formulir Tujuan</button>
        </label>
      </div>';

      $SyaratKetentuan = Syaratketentuan::find(1);
      
      return response()->json([
        'status_code'             => 200,
        'status'                  => "success",
        'message'                 => "Data berhasil ditampilkan",
        'data_diri'               => $DataDiri,
        'form_data_diri'          => $FormDataDiri,
        'tujuan'                  => $Tujuan,
        'form_tujuan'             => $FormTujuan,
        'syarat_ketentuan'        => $SyaratKetentuan
      ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activated_form_tujuan(Request $request)
    {
      $Activated  = $request->input('activated');
      if ($Activated == "Yes") {
        $affected = DB::table('ms_formtujuan')
                  ->where('id', 1)
                  ->update(['All' => $Activated]);
      } else {
        $affected = DB::table('ms_formtujuan')
                  ->where('id', 1)
                  ->update(
                    [
                      'All'                     => $Activated,
                      'AddresseesName'          => $Activated,
                      'AddresseesPhone'         => $Activated,
                      'DepartmentDestination'   => $Activated,
                      'ArrivalDestination'      => $Activated,
                      'NumberOfPersons'         => $Activated
                    ]
                  );
      }

      $Tujuan            = Tujuan::find(1);
      $CheckedTJAll      = $Tujuan->All == 'Yes' ? 'Checked' : '';
      $CheckedTJName     = $Tujuan->AddresseesName == 'Yes' ? 'Checked' : '';
      $CheckedTJPhone    = $Tujuan->AddresseesPhone == 'Yes' ? 'Checked' : '';
      $CheckedTJDept     = $Tujuan->DepartmentDestination == 'Yes' ? 'Checked' : '';
      $CheckedTJArrival  = $Tujuan->ArrivalDestination == 'Yes' ? 'Checked' : '';
      $CheckedTJNumbers  = $Tujuan->NumberOfPersons == 'Yes' ? 'Checked' : '';

      $ClassTJName       = $Tujuan->AddresseesName == 'Yes' ? 'border-bold' : '';
      $ClassTJPhone      = $Tujuan->AddresseesPhone == 'Yes' ? 'border-bold' : '';
      $ClassTJDept       = $Tujuan->DepartmentDestination == 'Yes' ? 'border-bold' : '';
      $ClassTJArrival    = $Tujuan->ArrivalDestination == 'Yes' ? 'border-bold' : '';
      $ClassTJNumbers    = $Tujuan->NumberOfPersons == 'Yes' ? 'border-bold' : '';

      $FormTujuan = 
      '<div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="AddresseesNameCheckbox" name="AddresseesNameCheckbox" '.$CheckedTJName.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="AddresseesName" name="AddresseesName" class="form-control '.$ClassTJName.'" placeholder="Nama orang yang dituju" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="AddresseesPhoneCheckbox" name="AddresseesPhoneCheckbox" '.$CheckedTJPhone.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="email" id="AddresseesPhone" name="AddresseesPhone" class="form-control '.$ClassTJPhone.'" placeholder="Nomor telepon orang yang dituju" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="DepartmentDestinationCheckbox" name="DepartmentDestinationCheckbox" '.$CheckedTJDept.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="DepartmentDestination" name="DepartmentDestination" class="form-control '.$ClassTJDept.'" placeholder="Department yang dituju" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="ArrivalDestinationCheckbox" name="ArrivalDestinationCheckbox" '.$CheckedTJArrival.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <h6 class="fs-15">Tujuan</h6>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan1" id="Tujuan1" value="option1" disabled>
            <label class="form-check-label" for="inlineRadio1">Pertemuan</label>
          </div>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan2" id="Tujuan2" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Wawancara & Psikotest</label>
          </div>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan3" id="Tujuan3" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Mengirim Paket</label>
          </div>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan4" id="Tujuan4" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Hari Pertama Bekerja</label>
          </div>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan5" id="Tujuan5" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Lainnya</label>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="NumberOfPersonsCheckbox" name="NumberOfPersonsCheckbox" '.$CheckedTJNumbers.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="NumberOfPersons" name="NumberOfPersons" class="form-control '.$ClassTJNumbers.'" placeholder="Berapa banyak orang yang bersama anda" readonly>
        </div>
      </div>
      <div class="row mb-3 float-end">
        <label for="inputEmail3" class="col-12 col-form-label">
          <button type="button" class="btn btn-primary" onclick="UpdateFormTujuan()">Simpan Formulir Tujuan</button>
        </label>
      </div>';

      if ($affected) {
        return response()->json([
          'status_code' => 200,
          'status'      => "success",
          'message'     => "Data berhasil disimpan",
          'tujuan'      => $Tujuan,
          'form_tujuan' => $FormTujuan
        ], 200);
      } else {
        return response()->json([
          'status_code' => 200,
          'status'      => "sucess",
          'message'     => "Data sukses disimpan",
          'tujuan'      => $Tujuan,
          'form_tujuan' => $FormTujuan
        ], 500);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated_form_tujuan(Request $request)
    {
      $Activated                = $request->input('Activated');
      $AddresseesNames          = $request->input('AddresseesNames');
      $AddresseesPhones         = $request->input('AddresseesPhones');
      $DepartmentDestinations   = $request->input('DepartmentDestinations');
      $ArrivalDestinations      = $request->input('ArrivalDestinations');
      $NumberOfPersons          = $request->input('NumberOfPersons');
      if ($Activated == "Yes") {
        $affected = DB::table('ms_formtujuan')
        ->where('id', 1)
        ->update(
          [
            'All'                     => $Activated,
            'AddresseesName'          => $AddresseesNames,
            'AddresseesPhone'         => $AddresseesPhones,
            'DepartmentDestination'   => $DepartmentDestinations,
            'ArrivalDestination'      => $ArrivalDestinations,
            'NumberOfPersons'         => $NumberOfPersons
          ]
        );
      } else {
        $affected = DB::table('ms_formtujuan')
        ->where('id', 1)
        ->update(
          [
            'All'                     => $Activated,
            'AddresseesName'          => $Activated,
            'AddresseesPhone'         => $Activated,
            'DepartmentDestination'   => $Activated,
            'ArrivalDestination'      => $Activated,
            'NumberOfPersons'         => $Activated
          ]
        );
      }

      $Tujuan            = Tujuan::find(1);
      $CheckedTJAll      = $Tujuan->All == 'Yes' ? 'Checked' : '';
      $CheckedTJName     = $Tujuan->AddresseesName == 'Yes' ? 'Checked' : '';
      $CheckedTJPhone    = $Tujuan->AddresseesPhone == 'Yes' ? 'Checked' : '';
      $CheckedTJDept     = $Tujuan->DepartmentDestination == 'Yes' ? 'Checked' : '';
      $CheckedTJArrival  = $Tujuan->ArrivalDestination == 'Yes' ? 'Checked' : '';
      $CheckedTJNumbers  = $Tujuan->NumberOfPersons == 'Yes' ? 'Checked' : '';

      $ClassTJName       = $Tujuan->AddresseesName == 'Yes' ? 'border-bold' : '';
      $ClassTJPhone      = $Tujuan->AddresseesPhone == 'Yes' ? 'border-bold' : '';
      $ClassTJDept       = $Tujuan->DepartmentDestination == 'Yes' ? 'border-bold' : '';
      $ClassTJArrival    = $Tujuan->ArrivalDestination == 'Yes' ? 'border-bold' : '';
      $ClassTJNumbers    = $Tujuan->NumberOfPersons == 'Yes' ? 'border-bold' : '';

      $FormTujuan = 
      '<div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="AddresseesNameCheckbox" name="AddresseesNameCheckbox" '.$CheckedTJName.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="AddresseesName" name="AddresseesName" class="form-control '.$ClassTJName.'" placeholder="Nama orang yang dituju" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="AddresseesPhoneCheckbox" name="AddresseesPhoneCheckbox" '.$CheckedTJPhone.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="email" id="AddresseesPhone" name="AddresseesPhone" class="form-control '.$ClassTJPhone.'" placeholder="Nomor telepon orang yang dituju" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="DepartmentDestinationCheckbox" name="DepartmentDestinationCheckbox" '.$CheckedTJDept.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="DepartmentDestination" name="DepartmentDestination" class="form-control '.$ClassTJDept.'" placeholder="Department yang dituju" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="ArrivalDestinationCheckbox" name="ArrivalDestinationCheckbox" '.$CheckedTJArrival.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <h6 class="fs-15">Tujuan</h6>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan1" id="Tujuan1" value="option1" disabled>
            <label class="form-check-label" for="inlineRadio1">Pertemuan</label>
          </div>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan2" id="Tujuan2" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Wawancara & Psikotest</label>
          </div>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan3" id="Tujuan3" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Mengirim Paket</label>
          </div>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan4" id="Tujuan4" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Hari Pertama Bekerja</label>
          </div>
          <div class="form-check form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="Tujuan5" id="Tujuan5" value="option2" disabled>
            <label class="form-check-label" for="inlineRadio2">Lainnya</label>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputEmail3" class="col-1 col-form-label">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="NumberOfPersonsCheckbox" name="NumberOfPersonsCheckbox" '.$CheckedTJNumbers.' onclick="SetBold()">
          </div>
        </label>
        <div class="col-11">
          <input type="text" id="NumberOfPersons" name="NumberOfPersons" class="form-control '.$ClassTJNumbers.'" placeholder="Berapa banyak orang yang bersama anda" readonly>
        </div>
      </div>
      <div class="row mb-3 float-end">
        <label for="inputEmail3" class="col-12 col-form-label">
          <button type="button" class="btn btn-primary" onclick="UpdateFormTujuan()">Simpan Formulir Tujuan</button>
        </label>
      </div>';

      if ($affected) {
        return response()->json([
          'status_code' => 200,
          'status'      => "success",
          'message'     => "Data berhasil disimpan",
          'tujuan'      => $Tujuan,
          'form_tujuan' => $FormTujuan
        ], 200);
      } else {
        return response()->json([
          'status_code' => 500,
          'status'      => "error",
          'message'     => "Data gagal disimpan",
          'tujuan'      => $Tujuan,
          'form_tujuan' => $FormTujuan
        ], 500);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated_form_syarat_dan_ketentuan(Request $request)
    {
      $Activated            = $request->input('Activated');
      $SyaratDanKetentuans  = $request->input('SyaratDanKetentuans');
      if ($Activated == "Yes") {
        $affected = DB::table('ms_formsyaratdanketentuan')
        ->where('id', 1)
        ->update(
          [
            'Activated'           => $Activated,
            'TermsAndConditions'  => $SyaratDanKetentuans,
            'UpdatedDate'         => date('Y-m-d H:i:s'),
            'UpdatedBy'           => Auth::user()->id
          ]
        );
      } else {
        $affected = DB::table('ms_formsyaratdanketentuan')
        ->where('id', 1)
        ->update(
          [
            'Activated'           => $Activated,
            'TermsAndConditions'  => $SyaratDanKetentuans,
            'UpdatedDate'         => date('Y-m-d H:i:s'),
            'UpdatedBy'           => Auth::user()->id
          ]
        );
      }

      $SyaratKetentuan = Syaratketentuan::find(1);
      if ($affected) {
        return response()->json([
          'status_code'       => 200,
          'status'            => "success",
          'message'           => "Data berhasil disimpan",
          'syarat_ketentuan'  => $SyaratKetentuan
        ], 200);
      } else {
        return response()->json([
          'status_code'       => 200,
          'status'            => "sucess",
          'message'           => "Data sukses disimpan",
          'syarat_ketentuan'  => $SyaratKetentuan
        ], 500);
      }
    }
}
