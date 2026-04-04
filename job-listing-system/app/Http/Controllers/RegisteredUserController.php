<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        $user = null;

        DB::transaction(function () use ($request, &$user) {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            Employer::create([
                'user_id' => $user->id,
                'name' => $request->input('employer_name'),
            ]);
        });

        Auth::login($user);

        return redirect()->route('jobs.index')->with('status', 'Welcome! Your account has been created.');
    }
}
