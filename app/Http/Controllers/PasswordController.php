<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
  public function index()
  {
    $Title    = "User";
    $SubTitle = "Update Password";

    return view('users.update-password', compact('Title', 'SubTitle'));
  }

  public function update_password(Request $request)
  {
    $request->validate([
      'CurrentPassword' => 'required',
      'NewPassword'     => 'required|min:7|max:15',
    ]);

    $user = Auth::user();

    if (!Hash::check($request->CurrentPassword, $user->password)) {
      return response()->json([
        'status_code' => 500,
        'status'      => "error",
        'message'     => "Password saat ini tidak cocok!"
      ], 500);
    } else {
      $user->password = Hash::make($request->NewPassword);
      $user->save();

      return response()->json([
        'status_code' => 200,
        'status'      => "success",
        'message'     => "Sukses update password anda"
      ], 200);
    }

    // $user->password = Hash::make($request->new_password);
    // $user->save();
  }
}
