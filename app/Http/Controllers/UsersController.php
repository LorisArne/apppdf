<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UsersController extends Controller
{
    /**
     * Display all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        $user = auth()->user();
        $isSuperAdmin = 0;

        if($user->roles[0]->name == "Superadmin"){
            $isSuperAdmin = 1;
        }
        return view('users.index', ['users' => $users, 'isSuperAdmin' => $isSuperAdmin]);
    }

    /**
     * Show form for creating user
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $isSuperAdmin = 0;

        if($user->roles[0]->name == "Superadmin"){
            $isSuperAdmin = 1;
        }
        $roles = Role::latest()->get();
        if($isSuperAdmin == 0){
            $roles = Role::where('name', '!=', 'Superadmin')->get();
        }

        return view('users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created user
     *
     * @param User $user
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request)
    {
        //For demo purposes only. When creating user or inviting a user
        // you should create a generated random password and email it to the user
        $user->create(array_merge($request->validated(), [
            'password' => 'test'
        ]));
        $lastUser = User::latest()->first();

        $lastUser->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->withSuccess(__('User created successfully.'));
    }

    /**
     * Show user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Edit user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $loggedUser = auth()->user();

     	$isSuperAdmin = 0;

        if($loggedUser->roles[0]->name == "Superadmin"){
            $isSuperAdmin = 1;
        }
        $roles = Role::latest()->get();
        if($isSuperAdmin == 0){
            $roles = Role::where('name', '!=', 'Superadmin')->get();
        }
        return view('users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => $roles
        ]);
    }

    /**
     * Update user data
     *
     * @param User $user
     * @param UpdateUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {

        $user->update($request->validated());

        $user->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }

    /**
     * Delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}
