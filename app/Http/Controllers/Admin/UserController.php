<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('user.index');
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
        $user = User::where('id', $id)->first();

        return view('admin.users.edit', [
            'id' => $user
        ])->with('user', $user);
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
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        return redirect()->route('user.index');
    }

    public function role($id)
    {
        $user = User::where('id', $id)->first();

        $roles = Role::all();

        foreach ($roles as $role) {
            if ($user->hasRole($role->name)) {
                $role->can = true;
            } else {
                $role->can = false;
            }
        }

        return view('admin.users.role', [
            'id' => $user,
            'roles' => $roles
        ])->with('user', $user);
    }

    public function roleSync(Request $request, $id)
    {
        $rolesRequest = $request->except(['_token', 'method']);

        foreach ($rolesRequest as $key => $value) {
            $roles[] = Role::where('id', $key)->first();
        }

        $user = User::where('id', $id)->first();

        if (!empty($roles)) {
            $user->syncRoles($roles);
        } else {
            $user->syncPermissions(null);
        }

        return redirect()->route('user.role', ['id' => $user->id]);
    }
}
