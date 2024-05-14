<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use DataTables;
use Validator;
//use App\Http\Requests\RoleRequest;
use App\Http\Requests\PermissionsNewRequest;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the role.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
      $this->middleware('permission:user-list|user-create|user-edit', ['only' => ['index', 'store']]);
      $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
      $this->middleware('permission:user-edit', ['only' => ['edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $Title    = "Roles & Permissions";
      $SubTitle = "Permissions";

      return view('permissions.index', compact('Title', 'SubTitle'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permission = Permission::get();
      
      return view('permissions.create', compact('permission'));
    }

    /**
     * Store a newly created role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(PermissionsNewRequest $request)
    public function store(Request $request)
    {
      $input_request = $request->input();
      $validator = Validator::make($input_request, [
        'permission'  => 'required|min:2',
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

      $permissions = Permission::create(['name' => $request->input('permission')]);
      if ($permissions) {
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

    /**
     * Display the specified role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $role = Role::find($id);

      //join roles table with role_has_permissions table (seeders: PermissionTableSeeder.php)
      $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
          ->where("role_has_permissions.role_id", $id)
          ->get();

      return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edited(Request $request)
    {
      $id         = $request->input('id');
      $permission = Permission::findOrFail($id);

      return response()->json([
        'status_code' => 200,
        'status'      => "success",
        'message'     => "Data berhasil ditampilkan",
        'data'        => $permission
      ], 200);
    }

    /**
     * Update the specified role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated(Request $request)
    {
      $input_request = $request->input();
      $validator = Validator::make($input_request, [
        'permission'  => 'required|min:2',
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

      $id                 = $request->input('kode');
      $permissions        = Permission::find($id);
      $permissions->name  = $request->input('permission');
      $permissions->save();

      if ($permissions) {
        return response()->json([
          'status_code' => 200,
          'status'      => "success",
          'message'     => "Data berhasil diupdate"
        ], 200);
      } else {
        return response()->json([
          'status_code' => 500,
          'status'      => "error",
          'message'     => "Data gagal diupdate"
        ], 500);
      }
    }
    /**
     * Remove the specified role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table("permissions")->where('id', $id)->delete();

      return redirect()->route('permissions.index')->with('success', 'Permissions deleted successfully');
    }

    public function deleted(Request $request) {
      $id       = $request->input('id');
      $deleted  = DB::table("permissions")->where('id', $id)->delete();
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

      //return redirect()->route('permissions.index')->with('success', 'Permissions deleted successfully');
    }

    public function dataTable()
    {
      //$permissions  = Permission::query();
      $permissions    = Permission::orderBy('created_at', 'DESC');

      return DataTables::eloquent($permissions)
      ->addIndexColumn()
      ->addColumn('action', function ($permissions) {
        $actionBtn = '<button class="btn btn-outline-success btn-sm me-1" onclick="edit('.$permissions->id.')" title="Edit"> 
                        <i class="ri-edit-2-fill"></i>
                      </button>
                      <button class="btn btn-outline-danger btn-sm" onclick="hapus('.$permissions->id.')" title="Edit"> 
                        <i class="ri-delete-bin-2-line"></i>
                      </button>';
        
        return $actionBtn;
      })
      ->rawColumns(['action'])
      ->toJson();
    }
}