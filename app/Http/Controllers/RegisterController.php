<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register.register',);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'first_name' => 'required|max:25|regex:/^[\pL\s]+$/u',
            'last_name' => 'required|max:25|regex:/^[\pL\s]+$/u',
            'email' => 'required|email:dns|unique:users',
            'role' => 'required',
            'gender' => 'required',
            'picture' => 'required|mimes:png,jpg,jpeg',
            'password' => 'required|min:8|regex:/^(?=.*[0-9]).+$/',
            'confirm_password' => 'required|same:password'
        ],[
            'first_name.regex' => 'Symbols are not allowed.',
            'last_name.regex' => 'Symbols are not allowed.',
            'password.regex' => 'Password must contain at least 1 number.'
        ]);

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/profile-picture', $filename);

            $user = new User;
            $user->first_name = $validatedData['first_name'];
            $user->last_name = $validatedData['last_name'];
            $user->email = $validatedData['email'];
            $user->role_id = $validatedData['role'];
            $user->gender_id = $validatedData['gender'];
            $user->display_picture_link = $filename;
            $user->password = Hash::make($validatedData['password']);
            $user->save();

            return redirect('/login');
        }
        return back();
    }
}
