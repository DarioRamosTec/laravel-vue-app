<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Response;
use Inertia\Inertia;

class UsersController extends Controller
{
    //: Response
    public function index() {
        $users = User::all();

        // return Inertia::render('Users/Index');
        return view('users.index');
    }

    public function create(): Response {
        return Inertia::render('Users/Create');
    }

    public function show(int $id): Response {
        $user = User::find($id);
        if (!$user) return redirect()->route('404');
        return Inertia::render('Users/Show');
    }

    public function edit(int $id): Response {
        $user = User::find($id);
        if (!$user) return redirect()->route('404');
        return Inertia::render('Users/Edit');
    }

    public function store(Request $request) {

    }

    public function update(Request $request, int $id) {
        $user = User::find($id);
        if (!$user) return redirect('404');
    }

    public function destroy(int $id) {
        $user = User::find($id);
        if (!$user) return redirect('404');
    }

    public function get(int $id=null)
    {
        if ($id) {
            $user = User::find($id);
            if (!$user) {
                return redirect('404');
            }
            return response()->json($user);
        }
        $users = User::all();
        return response()->json($users);
    }
}