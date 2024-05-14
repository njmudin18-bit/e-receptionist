<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Str;
use DB;
use Hash;
use DataTables;
use Validator;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Response\ResponseController as ResponseController;

class UserController extends ResponseController
{
    function __construct()
    {
      $this->middleware('permission:user-list|user-create|user-edit', ['only' => ['index', 'show']]);
      $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
      $this->middleware('permission:user-edit', ['only' => ['edit', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserRequest $request)
    {
      $Title    = "Roles & Permissions";
      $SubTitle = "Users";
      $roles    = Role::pluck('name', 'name')->all();

      return view('users.index', compact('Title', 'SubTitle', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
      $input_request  = $request->input();
      $validator      = Validator::make($input_request, [
        'name'    => 'required|min:2',
        'email'   => 'required|email'
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

      $input              = $request->all();
      $password           = $request['password']; //Str::random(8);
      $input['password']  = Hash::make($password);

      $user = User::updateOrCreate(['id' => $request->id], $input);
      $user->assignRole($request->input('roles'));

      // $email  = $input['email'];
      // $data   = [
      //   'title'    => "Please Change Your Deafault Password",
      //   'url'      => "localhost:8000",
      //   'name'     => $input['name'],
      //   'password' => $password,
      // ];

      // Mail::to($email)->send(new SendMail($data));

      if($user){
        return $this->sendResponse($user, 'User retrieved successfully.');
      }else{
        return $this->sendError($user, 'Failed');
      }
    }

    public function store2(UserRequest $request)
    {
      $input = $request->all();
      $password = Str::random(8);
      $input['password'] = Hash::make($password);

      $user = User::updateOrCreate(['id' => $request->id], $input);
      $user->assignRole($request->input('roles'));

      $email = $input['email'];
      $data = [
          'title'    => "Please Change Your Deafault Password",
          'url'      => "localhost:8000",
          'name'     => $input['name'],
          'password' => $password,
      ];
      Mail::to($email)->send(new SendMail($data));

      if($user){
          return $this->sendResponse($user, 'User retrieved successfully.');
      }else{
          return $this->sendError($user, 'Failed');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::find($id);

      return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $Title    = "Roles & Permissions";
      $SubTitle = "Edit User";
      $user     = User::find($id);
      $roles    = Role::pluck('name', 'name')->all();
      $userRole = $user->roles->pluck('name', 'name')->all();

      return view('users.edit', compact('Title', 'SubTitle', 'user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)
            ->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::find($id)->delete();
      
      return $this->sendResponse([], 'User deleted successfully.');
    }

    public function dataTable(Request $request)
    {
      if ($request->ajax()) {
        $data = User::latest()->get();
        
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('roles', function (User $user) {
            return $user->getRoleNames()->implode(', ');
        })
        ->addColumn('action', function ($user) {
          $EditURL   = "{{ route('show/', $user->id) }}";
          // $actionBtn = '<a href="users/'.$user->id.'" target="_blank" class="btn btn-outline-warning btn-sm me-1" title="Show"> 
          //                 <i class="ri-slideshow-2-line"></i>
          //               </a>
          //               <a href="users/'.$user->id.'/edit" target="_blank" class="btn btn-outline-success btn-sm me-1" title="Edit"> 
          //                 <i class="ri-edit-2-fill"></i>
          //               </a>
          //               <a href="users/'.$user->id.'" class="btn btn-outline-danger btn-sm" title="Hapus"> 
          //                 <i class="ri-delete-bin-2-line"></i>
          //               </a>';
          $actionBtn = '<a href="users/'.$user->id.'/edit" target="_blank" class="btn btn-outline-success btn-sm me-1" title="Edit"> 
                          <i class="ri-edit-2-fill"></i>
                        </a>';
          
          return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
      }
    }

    public function dataTable2(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('roles', function (User $user) {
                    return $user->getRoleNames()->implode(', ');
                })
                ->addColumn('action', function ($user) {
                    return view('users.action', [
                        'user'          => $user,
                        'url_show'      => route('users.show', $user->id),
                        'url_edit'      => route('users.edit', $user->id),
                        'url_destroy'   => route('users.destroy', $user->id)
                    ]);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
