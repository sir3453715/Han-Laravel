<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $queried = array();
        if(Auth::user()->hasRole('administrator')){
            $roles = Role::orderBy('id','ASC')
                ->get();
            $type_array = ['manager','administrator'];
        }else{
            $roles = Role::where('name','!=','administrator')
                ->orderBy('id','ASC')
                ->get();
            $type_array = ['manager'];
        }
        if($request->get('type') != 0) {
            $role = Role::find($request->get('type'));
            if($role){
                $type_array = [$role->name];
                $queried['type'] = $request->get('type');
            }
        }
        $users = User::role($type_array);

        if($request->get('email')) {
            $users = $users->where('email', $request->get('email'));
            $queried['email'] = $request->get('email');
        }

        $users = $users->get();
        return view('admin.user.user',[
            'users'=>$users,
            'roles' => $roles,
            'queried' => $queried,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if(Auth::user()->hasRole('administrator')) {
            $roles = Role::orderBy('id','ASC')
                ->get();
        }else{
            $roles = Role::where('name','!=','administrator')
                ->orderBy('id','ASC')
                ->get();
        }
        return view('admin.user.editUser',[
            'user'=>$user,
            'roles' => $roles,
            'user_roles' => $user->roles()->first()->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $data=[
            'name'=>$request->get('name')
        ];
        if($request->get('change_password')=='1'){
            if($request->get('password')){
                $data['password'] = Hash::make($request->get('password'));
            }
        }
        $user->fill($data);
        $user->save();
        if($request->get('users_role')){
            $role = Role::find($request->get('users_role'));
            if(!$user) {
                $user->assignRole($role->name);
            }else{
                $user->syncRoles($role->name);
            }
        }

        return redirect(route('admin.user.index'))->with('message', '帳號資料已更新!');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
