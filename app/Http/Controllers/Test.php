<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;

use Illuminate\Http\Request;

class Test extends Controller
{

    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::with('users')->get();

        return [
            "roles" => $roles,
            "users" => $users
        ];
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        if ($user) {
            return 'create success';
        }
        return 'create fail';
    }


    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return 'delete';
    }
}