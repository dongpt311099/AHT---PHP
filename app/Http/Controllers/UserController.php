<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    public function users(Request $request)
    {
        $users = User::all();
        return view('admin.users')->with([
            "users" => $users
        ]);
    }

    public function createUserView(Request $request)
    {
        $urlAction = route('createUser');
        return view('admin.create')->with(['urlAction' => $urlAction ]);
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $u = User::where('email', $request->email)->first();

        if (!isset($u)) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);
            return redirect(route("users"));
        } else {
            return view('admin.create')->with("error", "Email đã tồn tại");
        }
    }

    public function editUserView(Request $request, $id)
    {
        $urlAction = route('updateUser', ['id' => $id] );
        $u = User::find($id);
        return view('admin.create')->with([
            "user" => $u,
            'urlAction' => $urlAction
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');

        if(!isEmpty($request->input('password')))
        {
            $user->password = $request->input('password');
        }
        
        $user->role = $request->input('role');

        $user->save();

        return redirect()->route('users');
    }

    public function Delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users');
    }
}
