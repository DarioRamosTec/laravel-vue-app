<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index() {
        $users = User::all();
        return response()->json([
            "data" => $users
        ], 200);
    }

    public function show(int $id) {
        $user = User::find($id);
        if (!$user) return response()->json([], 404);
        return response()->json([
            "data" => $user
        ], 200);
    }

    public function update (Request $request, $id) {
        $user = User::find($id);
        if (!$user) {
            return view('404');
        }

        $request->validate([
            "name"          => "required|min:3|max:30",
            "last_name"     => "required|min:2|max:30",
            "degree"         => "required|min:2|max:30",
            "department"    => "required|min:2|max:30",
            "email"         => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);
        $user->name         = $request->get('name', $user->name) ;
        $user->last_name    = $request->get('last_name', $user->last_name);
        $user->degree        = $request->get('degree', $user->degree);
        $user->department   = $request->get('department', $user->department);
        $user->email        = $request->get('email', $user->email);
        $user->save();

        return response()->json([
            "data" => $user
        ], 200);
    }

    public function store (Request $request) {
        $request->validate([
            "name"          => "required|min:3|max:30",
            "last_name"     => "required|min:2|max:30",
            "degree"         => "required|min:2|max:30",
            "department"    => "required|min:2|max:30",
            "email"         => [
                'required',
                'email',
                'unique:App\Models\User,email',
            ],
        ]);
        $user = new User();
        $user->name         = $request->get('name') ;
        $user->last_name    = $request->get('last_name');
        $user->degree        = $request->get('degree');
        $user->department   = $request->get('department');
        $user->email        = $request->get('email');
        $user->save();

        return response()->json([
            "data" => $user
        ], 200);
    }

    public function destroy ($id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json([], 404);
        }
        $user->delete();

        return response()->json([
            "data" => $user
        ], 200);
    }
}