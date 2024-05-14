<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use DataTables;
use Validator;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
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
      $SubTitle = "Roles";

      return view('roles.index', compact('Title', 'SubTitle'));
    }

    /**
     * Show the form for creating a new role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $Title      = "Roles & Permissions";
      $SubTitle   = "Create New Role";
      $permission = Permission::get();

      return view('roles.create', compact('Title', 'SubTitle', 'permission'));
    }

    /**
     * Store a newly created role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showed(Request $request)
    {
      $id     = $request->input('id');
      $role   = Role::find($id);

      //join roles table with role_has_permissions table (seeders: PermissionTableSeeder.php)
      $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
          ->where("role_has_permissions.role_id", $id)
          ->get();

      return response()->json([
        'status_code' => 200,
        'status'      => "success",
        'message'     => "Data berhasil ditampilkan",
        'roles'       => $role,
        'permissions' => $rolePermissions,
      ], 200);

      //return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $Title      = "Roles & Permissions";
      $SubTitle   = "Edit Role";
      $role       = Role::findOrFail($id);
      $permission = Permission::get();

      $rolePermissions = DB::table("role_has_permissions")
          ->where("role_has_permissions.role_id", $id)
          ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
          ->all();

      return view('roles.edit', compact('Title', 'SubTitle', 'role', 'permission', 'rolePermissions'));
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
    public function update(RoleRequest $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }
    /**
     * Remove the specified role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)
                          ->delete();
        return redirect()->route('roles.index')
                         ->with('success', 'Role deleted successfully');
    }

    public function dataTable()
    {
      //$role = Role::query();
      $role = Role::orderBy('created_at', 'DESC');

      return Datatables::of($role)
      ->addIndexColumn()
      ->addColumn('action', function ($role) {
        $isi       = "'".$role->id."', '".$role->name."'";
        $actionBtn = '<button class="btn btn-outline-warning btn-sm me-1" onclick="show('.$isi.')" title="Show"> 
                        <i class="ri-slideshow-2-line"></i>
                      </button>
                      <a href="roles/'.$role->id.'/edit" target="_blank" class="btn btn-outline-success btn-sm me-1 title="Edit"> 
                        <i class="ri-edit-2-fill"></i>
                      </a>';
        
        return $actionBtn;
      })
      ->rawColumns(['action'])
      ->toJson();
    }

    public function dataTable2()
    {
      $role = Role::query();
      return Datatables::of($role)
      ->addIndexColumn()
      ->addColumn('action', function ($role) {
        return view('roles.action', [
          'role'          => $role,
          'url_show'      => route('roles.show', $role->id),
          'url_edit'      => route('roles.edit', $role->id),
          'url_destroy'   => route('roles.destroy', $role->id)
        ]);
      })
      ->rawColumns(['action'])
      ->make(true);
    }
}